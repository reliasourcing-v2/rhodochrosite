<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Application extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'full_name',
        'phone',
        'email',
        'position',
        'cv',
        'message',
    ];

    protected $appends = [
        'formatted_cv_url',
        'formatted_created_at',
    ];

    public function toSearchableArray()
    {
        $array = [
            'id' => (int) $this->id,
            'email' => $this->email,
            'full_name' => $this->full_name,
            'phone' => $this->phone,
            'position' => $this->position,
            'message' => $this->message,
        ];

        return $array;
    }

    public function getFormattedCreatedAtAttribute()
    {
        return optional($this->created_at)->format('M d, Y');
    }

    public function getFormattedCvUrlAttribute()
    {
        return Storage::url($this->cv);
    }

}
