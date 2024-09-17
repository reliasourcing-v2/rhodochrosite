<?php

namespace App\Http\Controllers\Admin\Modular;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ParentPageRequest;
use App\Http\Requests\FrameRequest;
use App\Http\Processors\ParentPageProcessor;
use App\Http\Requests\CardRequest;
use App\Http\Requests\SubPageRequest;
use App\Models\Modular\Card;
use App\Models\Modular\ParentPage;
use App\Models\Modular\Frame;
use App\Models\Modular\SubPage;

class ParentPageController extends Controller
{
    protected $parentPageProcessor;
    protected $indexRoute = 'admin.pages.parent.index';

    public function __construct(ParentPageProcessor $parentPageProcessor)
    {
        $this->parentPageProcessor = $parentPageProcessor;
    }

    public function index(Request $request)
    {
        $data = $this->parentPageProcessor->index($request);

        return Inertia::render('Admin/Modular/Index', $data);
    }

    public function create()
    {
        return Inertia::render('Admin/Modular/Create', []);
    }

    public function store(ParentPageRequest $request)
    {
        $this->parentPageProcessor->store($request);

        return to_route($this->indexRoute)
            ->with('success', 'Saved!');
    }

    public function edit(Request $request, ParentPage $parentPage)
    {
        return Inertia::render('Admin/Modular/Edit', [
            'item' => $parentPage,
            'frames' => $parentPage->frames()->get(),
            'selectedTab' => $request->input('tab'),
            'subPages' => $parentPage->sub_pages()->get()
        ]);
    }

    public function update(ParentPageRequest $request, ParentPage $parentPage)
    {
        $this->parentPageProcessor->update($request, $parentPage);

        return to_route($this->indexRoute)
            ->with('success', 'Saved!');
    }

    public function archive(ParentPage $parentPage)
    {
        $parentPage->delete();

        return to_route($this->indexRoute)
            ->with('success', 'Archived!');
    }

    public function restore(Request $request)
    {
        ParentPage::withTrashed()->find($request->id)->restore();

        return to_route($this->indexRoute)
            ->with('success', 'Restored!');
    }

    /*
    |--------------------------------------------------------------------------
    | @Modular Frame Methods
    |--------------------------------------------------------------------------
    */
    /**
     * Show create frame
     *
     * @return  RedirectResponse
     */

    public function storeFrame(FrameRequest $request, ParentPage $parentPage)
    {

        $this->parentPageProcessor->storeFrame($request, $parentPage);

        return redirect()
            ->route('admin.pages.parent.edit', [$parentPage->id, 'tab' => 'frames'])
            ->with('success', 'Saved!');
    }

    public function createFrame(ParentPage $parentPage)
    {
        return Inertia::render('Admin/Modular/Frames/Create', [
            'parent_page_id' => $parentPage->id,
        ]);
    }


    public function updateFrame(FrameRequest $request, Frame $frame)
    {
        $this->parentPageProcessor->updateFrame($request, $frame);

        return redirect()
            ->route('admin.pages.parent.edit', [$frame->parent_page_id, 'tab' => 'frames'])
            ->with('success', 'Saved!');
    }

    public function editFrame(Request $request, Frame $frame)
    {
        return Inertia::render('Admin/Modular/Frames/Edit', [
            'frame' => $frame,
            'cards' => $frame->cards()->get(),
        ]);
    }

    public function deleteFrame(Frame $frame) 
    {
        $frame->forceDelete();

        return redirect()
            ->route('admin.pages.parent.edit', [$frame->parent_page_id, 'tab' => 'frames'])
            ->with('success', 'Deleted!');
    }

    /**
     * Show create frame card
     *
     * @return  RedirectResponse
     */

    public function storeFrameCard(CardRequest $request, Frame $frame)
    {

        $this->parentPageProcessor->storeCard($request, $frame);

        return redirect()
         ->route('admin.pages.parent.edit-frame', [$frame->id])
            ->with('success', 'Saved!');
    }

    public function createFrameCard(Frame $frame)
    {
        return Inertia::render('Admin/Modular/Frames/Cards/Create', [
            'frame_id' => $frame->id,
        ]);
    }

    public function updateFrameCard(CardRequest $request, Card $card)
    {
        $this->parentPageProcessor->updateCard($request, $card);

        return redirect()
            ->route('admin.pages.parent.edit-frame', [$card->frame_id])
            ->with('success', 'Saved!');
    }

    public function editFrameCard(Request $request, Card $card)
    {
        return Inertia::render('Admin/Modular/Frames/Cards/Edit', [
            'item' => $card->load('frame')
        ]);
    }

    public function updateCardOrder(Request $request)
    {
        $data = $request->validate([
            'items.*.id' => 'required',
            'items.*.order' => 'required|numeric'
        ]);

        $items = Card::all();

        foreach ($items as $card) {
            $id = $card->id;
            foreach($request->items as $new) {
                if ($new['id'] == $id) {
                    $card->update(['order' => $new['order']]);
                }
            }
        }

        return redirect()
            ->back()
            ->with('success', 'Updated Successfully');
    }
}
