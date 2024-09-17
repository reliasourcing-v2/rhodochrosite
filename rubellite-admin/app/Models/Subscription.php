<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Subscription extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'solution',
        'role',
        'full_name',
        'phone',
        'email',
        'company',
        'position',
        'industry',
    ];

    protected $appends = [
        'formatted_created_at',
    ];

    public function toSearchableArray()
    {
        $array = [
            'id' => (int) $this->id,
            'solution' => $this->solution,
            'role' => $this->role,
            'position' => $this->position,
            'industry' => $this->industry,
            'email' => $this->email,
            'full_name' => $this->first_name,
            'phone' => $this->last_name,
            'company' => $this->subject,
        ];

        return $array;
    }

    public function getFormattedCreatedAtAttribute()
    {
        return optional($this->created_at)->format('M d, Y');
    }

}
