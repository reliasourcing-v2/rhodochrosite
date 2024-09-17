<?php

namespace App\Console\Commands;

use App\Models\Modular\ChildPage;
use App\Models\Modular\ParentPage;
use App\Models\Modular\SubPage;
use App\Models\Articles\Article;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Sitemap::create(config('app.url'))
        ->add(Url::create('/')
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(1.0)
        )
        ->add(ParentPage::get()->whereNull('deleted_at'))
        ->add(SubPage::has('parent_page')->get()->whereNull('deleted_at'))
        ->add(ChildPage::has('sub_page')->get()->whereNull('deleted_at'))
        ->add(Article::get()->whereNull('deleted_at'))
        ->add(Url::create('/contact-us')
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(1.0)
        )
        ->add(Url::create('/industries/gaming')
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(0.8)
        )
        ->add(Url::create('/industries/saas')
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(0.8)
        )
        ->add(Url::create('/industries/gaming')
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(0.8)
        )
        ->add(Url::create('/industries/e-commerce')
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(0.8)
        )
        ->add(Url::create('/industries/finance')
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            ->setPriority(0.8)
        )
        ->add(Url::create('/privacy-policy')
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            ->setPriority(0.8)
        )
        ->add(Url::create('/terms-and-conditions')
            ->setLastModificationDate(Carbon::yesterday())
            ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
            ->setPriority(0.8)
        )
        ->writeToFile(public_path('sitemap.xml'));
    }
}
