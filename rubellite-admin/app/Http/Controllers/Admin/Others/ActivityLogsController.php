<?php

namespace App\Http\Controllers\Admin\Others;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ActivityLogsController extends Controller
{
    /**
     * Activity Logs Index
     *
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        $query = $request->input('log_query');
        $event = $request->input('log_event');

        $activities = Activity::latest('id')->fetchRecords(search:$query, event:$event);

        return Inertia::render('Admin/ActivityLogs/Index', [
            'logs' => $activities['collection'],
            'selectedEvent' => $event,
            'logQuery' => $query,
        ]);
    }

}
