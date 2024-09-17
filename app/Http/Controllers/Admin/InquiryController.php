<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\Inquiry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InquiryController extends Controller
{
    public function index(Request $request)
    {

        $tab = $request->input('tab');
        $date = $request->input('date');

        $items = Inquiry::query();

        # Search
        if ($request->input('query')) {
            $search_query = Inquiry::search($request->input('query'));

            $ids = $search_query->get()->pluck('id');
            $items = $items->whereIn('id', $ids);

        }

        # Tab
        if ($tab === 'archived') {
            $items = $items->onlyTrashed();
        }

        # Date
        if ($date) {
            $items = $items->whereBetween('created_at', [
                Carbon::parse($date)->startOfDay(),
                Carbon::parse($date)->endOfDay(),
            ]);
        }

         // Setup pagination
         $items = $items->orderBy('created_at', 'desc')->paginate(request('rows') ?? 10)->appends(request()->query());

         // Process counts
         $active_count = Inquiry::count();
         $archived_count = Inquiry::onlyTrashed()->count();


        return Inertia::render('Admin/InquiryManagement/Inquiries/Index', [
                'items' => $items,
                'selectedTab' => $tab,
                'archived' => Inquiry::whereNotNull('deleted_at')->get(),
                'activeCount' => $active_count,
                'archivedCount' => $archived_count,
                'query' => $request->input('query'),
                'filterDate' => $date,
            ]
        );

    }

    public function view(Inquiry $inquiry)
    {
        return Inertia::render('Admin/InquiryManagement/Inquiries/View', [
            'item' => $inquiry,
        ]);
    }

    public function delete(Request $request, Inquiry $inquiry)
    {
        $inquiry->delete();

        return redirect()
            ->route('admin.contact.inquiries.index')
            ->with('success', 'Inquiry successfully deleted!');
    }

    public function restore(Request $request)
    {
        Inquiry::withTrashed()->find($request->id)->restore();

        return redirect()
            ->route('admin.contact.inquiries.index')
            ->with('success', 'Inquiry successfully restored!');
    }
}
