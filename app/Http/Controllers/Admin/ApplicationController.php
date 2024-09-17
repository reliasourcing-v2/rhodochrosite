<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Inertia\Inertia;
use App\Models\Application;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {

        $tab = $request->input('tab');
        $date = $request->input('date');

        $items = Application::query();

        # Search
        if ($request->input('query')) {
            $search_query = Application::search($request->input('query'));

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
         $active_count = Application::count();
         $archived_count = Application::onlyTrashed()->count();


        return Inertia::render('Admin/ApplicationManagement/Applications/Index', [
                'items' => $items,
                'selectedTab' => $tab,
                'archived' => Application::whereNotNull('deleted_at')->get(),
                'activeCount' => $active_count,
                'archivedCount' => $archived_count,
                'query' => $request->input('query'),
                'filterDate' => $date,
            ]
        );

    }

    public function view(Application $application)
    {
        return Inertia::render('Admin/ApplicationManagement/Applications/View', [
            'item' => $application,
        ]);
    }

    public function delete(Request $request, Application $application)
    {
        $application->delete();

        return redirect()
            ->route('admin.application.index')
            ->with('success', 'Application successfully deleted!');
    }

    public function restore(Request $request)
    {
        Application::withTrashed()->find($request->id)->restore();

        return redirect()
            ->route('admin.application.index')
            ->with('success', 'Application successfully restored!');
    }
}
