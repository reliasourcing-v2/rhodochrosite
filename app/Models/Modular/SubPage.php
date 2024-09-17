<?php

namespace App\Models\Modular;

use App\Traits\PrettyLog;
use Laravel\Scout\Searchable;
use App\Traits\RendersSelect;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class SubPage extends Model implements Sitemapable
{
    use HasFactory;
    use SoftDeletes;
    use Searchable;
    use RendersSelect;
    use LogsActivity;
    use PrettyLog;

    private const SELECT_COLUMN = "title";
    
    protected $fillable = [
        'parent_page_id',
        'order',
        'slug',
        'title',
        'image',
        'header',
        'subtitle',
        'description',

        // seo meta data
        'meta_title',
        'meta_description',
        'meta_keyword',
        'meta_image',
    ];

    protected $appends = [
        'formatted_image',
    ];

    /*
    |--------------------------------------------------------------------------
    | @GETTERS
    |--------------------------------------------------------------------------
    */

    public function getFormattedImageAttribute()
    {
        return Storage::url($this->image);
    }

    /*
    |--------------------------------------------------------------------------
    | @RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    public function parent_page()
    {
        return $this->belongsTo(ParentPage::class);
    }

    public function frames()
    {
        return $this->hasMany(Frame::class)->orderBy('order', 'ASC');
    }

    public function child_pages()
    {
        return $this->hasMany(ChildPage::class)->orderBy('order', 'ASC');
    }

    /*
    |--------------------------------------------------------------------------
    | SEARCH
    |--------------------------------------------------------------------------
    */
    public function toSearchableArray()
    {
        $array = [
            'id' => (int) $this->id,
            'title' => $this->title,
        ];

        return $array;
    }

    public function toSitemapTag(): Url | string | array
    {
        return Url::create(route('web.pages.sub-page', [
            'parentPage' =>  $this->parent_page->slug,
            'subPage' => $this->slug
        ]))
        ->setLastModificationDate(Carbon::create($this->updated_at))
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
        ->setPriority(1.0);
    }
}