<?php 
namespace App\Http\Processors;

use App\Models\Activity;
use App\Models\Modular\ParentHolderPage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class BaseRenderer {

     /**
     * Get datatable items
     *
     * @param  Request $params
     * @param  Model $model
     * @param  array $relationships
     * 
     * @return array
     */
    public function getData(Request $params, Model $model, array $relationships = [] ): array
    {
        $items    = $this->withSearchFilters($model, $params, $relationships);
        $logsData = $this->withActivityLogs($params, $model);

        $data = [
                'items'         => $items,
                'allCount'      => $model->count(),
                'archivedCount' => $model->onlyTrashed()?->count(),
                'rows'          => $params->rows,
                'selectedTab'   => $params->tab,
                'searchQuery'   => $params->searchQuery ?? null,
                'filterDate'    => $params->date,
        ];

        return array_merge($data, $logsData);
    }

    public function withActivityLogs($params, $model): array
    {
        $logs      = $params->tab === 'activity_logs' ? $model : [];
        $logsCount = $params->tab === 'activity_logs' ? Activity::where('subject_type', $model)->count() : 0;

        return [
            'logs'           => $logs,
            'logsCount'      => $logsCount,
            'filterLogEvent' => $params->log_event,
            'filterLogQuery' => $params->log_query,
        ];
    }

     /**
     * Apply Filters
     *
     * @param  Model $model
     * @param  Request $request
     * 
     * @return object
     */
    public function withSearchFilters(Model $model, Request $request, array $relationships): object
    {
        $items = $model::query();
    
        $items->when($request->input('query'), function ($query) use ($request, $model) {
            $searchQuery = $model::search($request->input('query'))->withTrashed();
            $searchQuery = $this->withArchivedItems($request, $searchQuery)->withTrashed();

            $ids = $searchQuery->get()->pluck('id');
            $query = $query->whereIn('id', $ids);
        })
        ->when($request->input('date'), function ($query) use ($request) {
            return $this->withDateFilter($query, $request->date);
        });

        return $this->withArchivedItems($request, $items)
            ->with($relationships);
    }

    public function withDateFilter($query, $date)
    {
        return $query->whereBetween('created_at', [
            Carbon::parse($date)->startOfDay(),
            Carbon::parse($date)->endOfDay()
        ]);
    }

    public function withArchivedItems(Request $request, $items): object
    {
        if ($request->input('tab') === 'archived') {
            return $items->onlyTrashed();
        }

        return $items;
    }
}