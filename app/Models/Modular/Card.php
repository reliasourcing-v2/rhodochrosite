<?php

namespace App\Models\Modular;

use App\Traits\PrettyLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Laravel\Scout\Searchable;
use Spatie\Activitylog\Traits\LogsActivity;

class Card extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Searchable;
    use LogsActivity;
    use PrettyLog;

    protected $fillable = [ 
        'frame_id',
        'order',
        'title',
        'content',
        'image',
        'accent',
        'icon',
        'linkedin_link'
    ];

    protected $appends = [
        'formatted_image_path',
    ];

    public function getFormattedImagePathAttribute()
    {
        return $this->image_path ? Storage::url($this->image_path) : '';
    }

    /*
    |--------------------------------------------------------------------------
    | @RELATIONSHIPS
    |--------------------------------------------------------------------------
     */

    public function frame()
    {
        return $this->belongsTo(Frame::class);
    }

    public function toSearchableArray()
    {
        $array = [
            'id' => (int) $this->id,
            'content' => $this->content,
        ];

        return $array;
    }
}
