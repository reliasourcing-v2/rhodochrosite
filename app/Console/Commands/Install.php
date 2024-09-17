<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear database and seed data';

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
        if (!file_exists('public/storage')) {
            $this->call('storage:link');
        }
        
        // clear database
        $this->call('migrate:fresh');
        // run the seeder
        $this->call('db:seed');
        // sync the cms
        $this->call('cms:sync');

        if (!config('app.key')) {
            $this->call('key:generate');
        }
    }

}
