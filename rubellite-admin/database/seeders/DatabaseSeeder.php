<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // AdminSeeder::class,
            // PermissionSeeder::class,
            // ParentPageSeeder::class,
            // SubPageSeeder::class,
            // ChildPageSeeder::class
            CMSPagesSeeder::class,
            SolutionsSeeder::class,
            SpecializationSeeder::class,
            IndustriesSeeder::class,
            OurAdvantagesSeeder::class,
            OurTeamSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
