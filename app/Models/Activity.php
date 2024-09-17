<?php

namespace App\Models;

use App\Traits\ReadableTimestamp;
use Laravel\Scout\Searchable;
use Spatie\Activitylog\Models\Activity as Model;

class Activity extends Model
{
    use Searchable;
    use ReadableTimestamp;

    public $asYouType = true;

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = [
            'id' => $this->id,
            'description' => $this->description,
            'causer' => $this->causer,
            'properties' => $this->properties,
        ];

        return $array;
    }

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'causer_name',
    ];

    /**
     * Render `name` attribute
     *
     * @return string
     */
    public function getCauserNameAttribute()
    {
        if ($this->causer) {
            return $this->causer()->first() ? $this->causer()->first()->name : null;
        } else {
            return null;
        }
    }

    public function scopeForSubjectType($query, string $model)
    {
        return $query->where('subject_type', $model);
    }

    public function scopeFetchRecords($query, $search = null, $event = null, $paginate = ['enable' => true, 'count' => 10])
    {
        // get count before applying filters
        $count = $query->count();

        if ($search) {
            $searchQuery = $this->search($search);

            $ids = $searchQuery->get()->pluck('id');
            $query = $query->whereIn('id', $ids);
        }

        if ($event) {
            $query = $query->forEvent($event);
        }

        return [
            'collection' => $paginate['enable'] ? $query->paginate($paginate['count'])->appends(request()->query()) : $query->get(),
            'count' => $count,
        ];
    }
}
