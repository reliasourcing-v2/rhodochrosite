<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Computation extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $fillable = [
        'email',
        'pdf',
    ];

    protected $appends = [
        'formatted_pdf_url',
        'formatted_created_at',
    ];

    public function toSearchableArray()
    {
        $array = [
            'email' => $this->email,
        ];

        return $array;
    }

    public function getFormattedCreatedAtAttribute()
    {
        return optional($this->created_at)->format('M d, Y');
    }

    public function getFormattedPdfUrlAttribute()
    {
        return Storage::url($this->pdf);
    }

}
