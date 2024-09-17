<?php

namespace App\Models;

use App\Traits\ReadableTimestamp;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class CmsPage extends Model
{
    use ReadableTimestamp;
    
    public $guarded = [];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'content' => 'array',
    ];

    public function renderUrl($path, $default = null)
    {
        $path = $path ?: $default;
        return Storage::url($path);
    }
}
