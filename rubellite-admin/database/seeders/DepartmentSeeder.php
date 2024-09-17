<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DepartmentSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['name' => 'Activations'],
            ['name' => 'Project Management'],
            ['name' => 'Discovery'],
            ['name' => 'Design'],
            ['name' => 'FE Development'],
            ['name' => 'BE Development'],
            ['name' => 'QA/QC'],
            ['name' => 'Admin/HR'],
            ['name' => 'Management'],
        ];

        foreach ($items as $item) {
            Department::create($item);
        }
    }
}
