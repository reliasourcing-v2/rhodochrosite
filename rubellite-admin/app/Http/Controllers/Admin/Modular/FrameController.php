<?php

namespace App\Http\Controllers\Admin\Modular;

use Inertia\Inertia;
use App\Models\Modular\Frame;
use App\Models\Modular\Card;
use App\Http\Controllers\Controller;
use App\Http\Processors\FrameProcessor;
use Illuminate\Http\Request;
use App\Http\Requests\CardRequest;

class FrameController extends Controller
{
    protected $frameProcessor;

    public function __construct(FrameProcessor $frameProcessor)
    {
        $this->frameProcessor = $frameProcessor;
    }

    /**
     * Reorder frames
    * 
    * @param   Request $request
    * @return  RedirectResponse
    */
    public function updateOrder(Request $request)
    {
        $data = $request->validate([
            'items.*.id' => 'required',
            'items.*.order' => 'required|numeric'
        ]);

        $items = Frame::all();

        foreach ($items as $frame) {
            $id = $frame->id;
            foreach($request->items as $new) {
                if ($new['id'] == $id) {
                    $frame->update(['order' => $new['order']]);
                }
            }
        }

        return redirect()
            ->back()
            ->with('success', 'Updated Successfully');
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

    public function deleteFrame(Frame $item)
    {
        $item->forceDelete();

        return redirect()
            ->back()
            ->with('success', 'Deleted!');
    }

    public function deleteCard(Card $item)
    {
        $item->forceDelete();

        return redirect()
            ->back()
            ->with('success', 'Deleted!');
    }
}