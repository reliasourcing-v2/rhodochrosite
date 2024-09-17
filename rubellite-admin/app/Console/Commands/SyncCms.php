<?php

namespace App\Console\Commands;

use App\Models\CmsPage;
use Illuminate\Console\Command;

class SyncCms extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cms:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync CMS Schema';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $schema = config('cms.schema');
        foreach ($schema as $page) {
            CmsPage::firstOrCreate([
                'slug' => $page['slug'], 
                'label' => $page['label'],
                'show_metadata' => $page['show_metadata'],
            ]);
        }
    }
}
