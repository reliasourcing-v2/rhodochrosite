<?php

namespace App\Models;

use App\Traits\PrettyLog;
use App\Traits\ReadableTimestamp;
use App\Traits\RendersSelect;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Laravel\Scout\Searchable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use SoftDeletes;
    // use Searchable;
    use LogsActivity;
    use PrettyLog;
    use ReadableTimestamp;
    use RendersSelect;

    private const SELECT_COLUMN = 'name';

    public $asYouType = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'guard_name',
    ];

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    // public function toSearchableArray()
    // {
    //     $array = [
    //         'id' => $this->id,
    //         'name' => $this->name,
    //     ];

    //     return $array;
    // }
}
