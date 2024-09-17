<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    private $guardName = 'admin';

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'label' => 'Manage Activity Logs',
                'name' => 'manage-activity-logs',
                'description' => 'Allow the Admin to access the activity logs',
                'guard_name' => $this->guardName,
            ],
        ];

        $superadmin = Role::create([
            'name' => 'Superadmin',
            'guard_name' => $this->guardName,
        ]);

        foreach ($permissions as $permission) {
            $superadmin->givePermissionTo(Permission::create($permission));
        }

        $admin = Admin::where('email', 'admin@praxxys.ph')->first();

        if ($admin) {
            $admin->assignRole($superadmin);
        }
    }
}
