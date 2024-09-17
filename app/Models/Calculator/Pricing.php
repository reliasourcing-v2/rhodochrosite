<?php

namespace App\Models\Calculator;

use Carbon\Carbon;
use App\Traits\PrettyLog;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pricing extends Model
{
    use HasFactory, SoftDeletes, Searchable, LogsActivity, PrettyLog;

    protected $fillable = [
        'role',
        'experience',
        'country',
        'offshore',
        'onshore',
    ];

    /*
    |--------------------------------------------------------------------------
    | SEARCHABLE ARRAY
    |--------------------------------------------------------------------------
     */

     public function toSearchableArray()
     {
         $array = [
             'id' => $this->id,
             'role' => $this->role,
             'experience' => $this->experience,
             'country' => $this->country,
         ];
 
         return $array;
     }
}
