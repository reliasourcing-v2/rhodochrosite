<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\RendersSelect;

class Department extends Model
{
    private const SELECT_COLUMN = 'name';
    
    use HasFactory, RendersSelect;

    /**
     * The attributes that are guarded
     *
     * @var array
     */
    protected $guarded = [];
}
