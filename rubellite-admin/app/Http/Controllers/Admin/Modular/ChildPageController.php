<?php

namespace App\Http\Controllers\Admin\Modular;

use App\Http\Controllers\Controller;
use App\Http\Processors\ChildPageProcessor;
use App\Http\Requests\CardRequest;
use App\Http\Requests\ChildPageRequest;
use App\Http\Requests\FrameRequest;
use App\Models\Modular\Card;
use App\Models\Modular\ChildPage;
use App\Models\Modular\Frame;
use App\Models\Modular\SubPage;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ChildPageController extends Controller
{
    protected $childPageProcessor;
    protected $indexRoute = 'admin.pages.child.index';

    public function __construct(ChildPageProcessor $childPageProcessor)
    {
        $this->childPageProcessor = $childPageProcessor;
    }

    public function create(SubPage $subPage)
    {
        return Inertia::render('Admin/Modular/ChildrenPages/Create', [
            'sub_page_id' => $subPage->id,
        ]);
    }

    public function store(ChildPageRequest $request)
    {
        $this->childPageProcessor->store($request);

        return redirect()
            ->route('admin.pages.subpage.edit', [$request->sub_page_id, 'tab' => 'children-pages'])
            ->with('success', 'Saved!');
    }

    public function edit(Request $request, ChildPage $childPage)
    {
        return Inertia::render('Admin/Modular/ChildrenPages/Edit', [
            'item' => $childPage,
            'frames' => $childPage->frames()->get(),
            'selectedTab' => $request->input('tab'),
        ]);
    }

    public function update(ChildPageRequest $request, ChildPage $childPage)
    {
        $this->childPageProcessor->update($request, $childPage);

        return redirect()
            ->route('admin.pages.subpage.edit', [$childPage->sub_page_id, 'tab' => 'children-pages'])
            ->with('success', 'Saved!');
    }

    public function archive(ChildPage $childPage)
    {
        $childPage->delete();

        return redirect()
            ->back()
            ->with('success', 'Deleted!');
    }

    public function restore(Request $request)
    {
        ChildPage::withTrashed()->find($request->id)->restore();

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

    public function storeFrame(FrameRequest $request, ChildPage $childPage, Frame $frame)
    {

        $this->childPageProcessor->storeFrame($request, $childPage);

        return redirect()
            ->route('admin.pages.child.edit', [$childPage->id, 'tab' => 'frames'])
            ->with('success', 'Saved!');
    }

    public function createFrame(ChildPage $childPage)
    {
        return Inertia::render('Admin/Modular/ChildrenPages/Frames/Create', [
            'child_page_id' => $childPage->id,
        ]);
    }


    public function updateFrame(FrameRequest $request, Frame $frame)
    {
        $this->childPageProcessor->updateFrame($request, $frame);

        return redirect()
            ->route('admin.pages.child.edit', [$frame->child_page_id, 'tab' => 'frames'])
            ->with('success', 'Saved!');
    }

    public function editFrame(Request $request, Frame $frame)
    {
        return Inertia::render('Admin/Modular/ChildrenPages/Frames/Edit', [
            'frame' => $frame,
            'cards' => $frame->cards()->get(),
        ]);
    }

    public function deleteFrame(Frame $frame) 
    {
        $frame->forceDelete();

        return redirect()
            ->route('admin.pages.child.edit', [$frame->child_page_id, 'tab' => 'frames'])
            ->with('success', 'Deleted!');
    }

    /**
     * Show create frame card
    *
    * @return  RedirectResponse
    */

    public function storeFrameCard(CardRequest $request, Frame $frame)
    {

        $this->childPageProcessor->storeCard($request, $frame);

        return redirect()
        ->route('admin.pages.child.edit-frame', [$frame->id])
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
        $this->childPageProcessor->updateCard($request, $card);

        return redirect()
        ->route('admin.pages.child.edit-frame', [$card->frame_id])
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
