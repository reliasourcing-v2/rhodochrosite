<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Inquiry extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'full_name',
        'phone',
        'email',
        'company',
        'message',
        'recaptcha_response'
    ];

    protected $appends = [
        'formatted_created_at',
    ];

    public function toSearchableArray()
    {
        $array = [
            'id' => (int) $this->id,
            'email' => $this->email,
            'full_name' => $this->first_name,
            'phone' => $this->last_name,
            'company' => $this->subject,
            'message' => $this->message,
        ];

        return $array;
    }

    public function getFormattedCreatedAtAttribute()
    {
        return optional($this->created_at)->format('M d, Y');
    }

}
