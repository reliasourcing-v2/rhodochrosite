<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{
    public function index(Request $request)
    {

        $tab = $request->input('tab');
        $date = $request->input('date');

        $items = Subscription::query();

        # Search
        if ($request->input('query')) {
            $search_query = Subscription::search($request->input('query'));

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
         $active_count = Subscription::count();
         $archived_count = Subscription::onlyTrashed()->count();


        return Inertia::render('Admin/InquiryManagement/Subscriptions/Index', [
                'items' => $items,
                'selectedTab' => $tab,
                'archived' => Subscription::whereNotNull('deleted_at')->get(),
                'activeCount' => $active_count,
                'archivedCount' => $archived_count,
                'query' => $request->input('query'),
                'filterDate' => $date,
            ]
        );

    }

    public function view(Subscription $subscription)
    {
        return Inertia::render('Admin/InquiryManagement/Subscriptions/View', [
            'item' => $subscription,
        ]);
    }

    public function delete(Request $request, Subscription $subscription)
    {
        $subscription->delete();

        return redirect()
            ->route('admin.contact.subscriptions.index')
            ->with('success', 'Subscription successfully deleted!');
    }

    public function restore(Request $request)
    {
        Subscription::withTrashed()->find($request->id)->restore();

        return redirect()
            ->route('admin.contact.subscriptions.index')
            ->with('success', 'Subscription successfully restored!');
    }
}
