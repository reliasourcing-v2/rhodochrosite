<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\Computation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComputationController extends Controller
{
    public function index(Request $request)
    {

        $tab = $request->input('tab');
        $date = $request->input('date');

        $items = Computation::query();

        # Search
        if ($request->input('query')) {
            $search_query = Computation::search($request->input('query'));

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
         $active_count = Computation::count();
         $archived_count = Computation::onlyTrashed()->count();


        return Inertia::render('Admin/ComputationManagement/Computations/Index', [
                'items' => $items,
                'selectedTab' => $tab,
                'archived' => Computation::whereNotNull('deleted_at')->get(),
                'activeCount' => $active_count,
                'archivedCount' => $archived_count,
                'query' => $request->input('query'),
                'filterDate' => $date,
            ]
        );

    }

    public function view(Computation $computation)
    {
        return Inertia::render('Admin/ComputationManagement/Computations/View', [
            'item' => $computation,
        ]);
    }

    public function delete(Request $request, Computation $computation)
    {
        $computation->delete();

        return redirect()
            ->route('admin.computation.index')
            ->with('success', 'Computation successfully deleted!');
    }

    public function restore(Request $request)
    {
        Computation::withTrashed()->find($request->id)->restore();

        return redirect()
            ->route('admin.computation.index')
            ->with('success', 'Computation successfully restored!');
    }
}
