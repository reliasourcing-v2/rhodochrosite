<?php

namespace App\Models\Modular;

use App\Traits\PrettyLog;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;

class ChildPage extends Model implements Sitemapable
{
    use HasFactory;
    use SoftDeletes;
    use Searchable;
    use LogsActivity;
    use PrettyLog;

    protected $fillable = [
        'sub_page_id',
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


    /*
    |--------------------------------------------------------------------------
    | @RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    public function sub_page()
    {
        return $this->belongsTo(SubPage::class);
    }

    public function frames()
    {
        return $this->hasMany(Frame::class)->orderBy('order', 'ASC');
    }

    public function toSitemapTag(): Url | string | array
    {
        return Url::create(route('web.pages.child-page', [
            'parentPage' =>  $this->sub_page->parent_page->slug,
            'subPage' => $this->sub_page->slug,
            'childPage' => $this->slug,
        ]))
        ->setLastModificationDate(Carbon::create($this->updated_at))
        ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
        ->setPriority(1.0);
    }
}
