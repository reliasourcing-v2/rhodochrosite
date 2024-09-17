<?php

namespace App\Http\Controllers\Admin\Modular;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubPageRequest;
use App\Http\Requests\FrameRequest;
use App\Http\Processors\SubPageProcessor;
use App\Http\Requests\CardRequest;
use App\Models\Modular\Card;
use App\Models\Modular\SubPage;
use App\Models\Modular\ParentPage;
use App\Models\Modular\Frame;

class SubPageController extends Controller
{
    protected $subPageProcessor;
    protected $indexRoute = 'admin.pages.parent.index';

    public function __construct(SubPageProcessor $subPageProcessor)
    {
        $this->subPageProcessor = $subPageProcessor;
    }


    public function create(ParentPage $parentPage)
    {
        return Inertia::render('Admin/Modular/SubPages/Create', [
            'parent_page_id' => $parentPage->id,
        ]);
    }

    public function store(SubPageRequest $request)
    {
        $this->subPageProcessor->store($request);

        return redirect()
            ->route('admin.pages.parent.edit', [$request->parent_page_id, 'tab' => 'sub-pages'])
            ->with('success', 'Saved!');
    }

    public function edit(Request $request, SubPage $subPage)
    {
        return Inertia::render('Admin/Modular/SubPages/Edit', [
            'item' => $subPage,
            'frames' => $subPage->frames()->get(),
            'childrenPages' => $subPage->child_pages()->get(),
            'selectedTab' => $request->input('tab'),
        ]);
    }

    public function update(SubPageRequest $request, SubPage $subPage)
    {
        $this->subPageProcessor->update($request, $subPage);

        return redirect()
            ->route('admin.pages.parent.edit', [$subPage->parent_page_id, 'tab' => 'sub-pages'])
            ->with('success', 'Saved!');
    }

    public function archive(SubPage $subPage)
    {
        $subPage->delete();

        return redirect()
            ->route('admin.pages.parent.edit', [$subPage->parent_page_id, 'tab' => 'sub-pages'])
            ->with('success', 'Deleted!');
    }

    public function restore(Request $request)
    {
        SubPage::withTrashed()->find($request->id)->restore();

        return to_route($this->indexRoute)
            ->with('success', 'Restored!');
    }

    public function updateOrder(Request $request)
    {
        $data = $request->validate([
            'items.*.id' => 'required',
            'items.*.order' => 'required|numeric'
        ]);

        $items = SubPage::all();

        foreach ($items as $item) {
            $id = $item->id;
            foreach($request->items as $new) {
                if ($new['id'] == $id) {
                    $item->update(['order' => $new['order']]);
                }
            }
        }

        return redirect()
            ->back()
            ->with('success', 'Updated Successfully');
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

    public function storeFrame(FrameRequest $request, SubPage $subPage, Frame $frame)
    {

        $this->subPageProcessor->storeFrame($request, $subPage);

        return redirect()
            ->route('admin.pages.subpage.edit', [$subPage->id, 'tab' => 'frames'])
            ->with('success', 'Saved!');
    }

    public function createFrame(SubPage $subPage)
    {
        return Inertia::render('Admin/Modular/SubPages/Frames/Create', [
            'sub_page_id' => $subPage->id,
        ]);
    }


    public function updateFrame(FrameRequest $request, Frame $frame)
    {
        $this->subPageProcessor->updateFrame($request, $frame);

        return redirect()
            ->route('admin.pages.subpage.edit', [$frame->sub_page_id, 'tab' => 'frames'])
            ->with('success', 'Saved!');
    }

    public function editFrame(Request $request, Frame $frame)
    {
        return Inertia::render('Admin/Modular/SubPages/Frames/Edit', [
            'frame' => $frame,
            'cards' => $frame->cards()->get(),
        ]);
    }

    public function deleteFrame(Frame $frame) 
    {
        $frame->forceDelete();

        return redirect()
            ->route('admin.pages.subpage.edit', [$frame->sub_page_id, 'tab' => 'frames'])
            ->with('success', 'Deleted!');
    }

    /**
     * Show create frame card
     *
     * @return  RedirectResponse
     */

    public function storeFrameCard(CardRequest $request, Frame $frame)
    {

        $this->subPageProcessor->storeCard($request, $frame);

        return redirect()
        ->route('admin.pages.subpage.edit-frame', [$frame->id])
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
        $this->subPageProcessor->updateCard($request, $card);

        return redirect()
        ->route('admin.pages.subpage.edit-frame', [$card->frame_id])
            ->with('success', 'Saved!');
    }

    public function editFrameCard(Request $request, Card $card)
    {
        return Inertia::render('Admin/Modular/Frames/Cards/Edit', [
            'item' => $card->load('frame'),
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
