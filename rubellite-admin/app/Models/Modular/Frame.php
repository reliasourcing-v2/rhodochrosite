<?php

namespace App\Models\Modular;

use App\Traits\PrettyLog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;

class Frame extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Searchable;
    use LogsActivity;
    use PrettyLog;

    protected $fillable = [
        'order',
        'parent_page_id',
        'sub_page_id',
        'child_page_id',
        'custom_class',
        'label',
        'image_first',
        'frame_type',
        'card_type',
        'image',
        'title',
        'content',
        'button_text',
        'button_link',
    ];

    protected $appends = [
    ];

    /*
    |--------------------------------------------------------------------------
    | @RELATIONSHIPS
    |--------------------------------------------------------------------------
    */
    public function parent_page() {
        return $this->belongsTo(ParentPage::class);
    }

    public function sub_page() {
        return $this->belongsTo(SubPage::class);
    }

    public function child_page() {
        return $this->belongsTo(ChildPage::class);
    }

    public function cards()
    {
        return $this->hasMany(Card::class)->orderBy('order', 'ASC');
    }

    /*
    |--------------------------------------------------------------------------
    | @GETTERS
    |--------------------------------------------------------------------------
    */
    
}
