<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'email' => 'admin@praxxys.ph',
                'title' => 'Admin',
                'password' => Hash::make('password'),
                'role_id' => 1
            ]
        ];

        Admin::truncate();

        foreach ($admins as $admin) {
            Admin::create($admin);
        }
    }
}
