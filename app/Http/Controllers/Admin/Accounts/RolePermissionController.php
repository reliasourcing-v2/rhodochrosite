<?php

namespace App\Http\Controllers\Admin\Accounts;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Role;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Spatie\Permission\Models\Permission;

class RolePermissionController extends Controller
{
    /**
     * RolePermission Index
     *
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        $isArchived = $request->tab === 'archived';
        $query = $request->input('query');

        $roles = Role::query();

        // Handle search requests
        if ($query) {
            $searchQuery = Role::search($query);

            // Filter tab
            if ($isArchived) {
                $searchQuery = $searchQuery->onlyTrashed();
            }

            $ids = $searchQuery->get()->pluck('id');
            $roles = $roles->whereIn('id', $ids);
        }

        // Filter tab
        if ($isArchived) {
            $roles = $roles->onlyTrashed();
        }

        // Setup pagination
        $roles = $roles->latest('id')->paginate(10)->appends(request()->query());
        // Process counts
        $activeCount = Role::count();
        $archivedCount = Role::onlyTrashed()->count();

        return Inertia::render('Admin/RolePermissionManagement/Index', [
            'items' => $roles,
            'activeCount' => $activeCount,
            'archivedCount' => $archivedCount,
            'query' => $query, // return search query
            'selectedTab' => $request->input('tab'), // return selected tab
        ]);
    }

    public function view(Role $role)
    {
        return Inertia::render('Admin/RolePermissionManagement/View', [
            'role' => $role
        ]);
    }

    /**
     * RolePermission Edit
     *
     * @return \Inertia\Response
     */
    public function edit(Request $request, Role $role)
    {
        $query = $request->input('log_query');
        $event = $request->input('log_event');

        $activities = Activity::latest('id')->forSubject($role)->fetchRecords(search:$query, event:$event);

        $savedPermissions = [];

        foreach ($role->permissions()->pluck('id') as $permission) {
            $savedPermissions[$permission] = true;
        }

        return Inertia::render('Admin/RolePermissionManagement/Edit', [
            'role' => $role,
            'selectedTab' => $request->input('tab'),
            'logs' => $activities['collection'],
            'logsCount' => $activities['count'],
            'selectedEvent' => $event,
            'logQuery' => $query,
            'permissions' => Permission::get(),
            'savedPermissions' => $savedPermissions,
        ]);
    }

    /**
     * RolePermission update
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function update(Request $request, Role $role)
    {
        $role->update($request->validate([
            'name' => ['required', 'max:50', 'unique:roles,name,' . $role->id],
            'description' => ['nullable', 'max:100'],
        ]));

        $this->setPermission($role, $request->input('permissions'));

        return to_route('admin.accounts.roles.index')
            ->with('success', 'Saved!');
    }

    /**
     * RolePermission Create
     *
     * @return \Inertia\Response
     */
    public function create(Request $request)
    {
        return Inertia::render('Admin/RolePermissionManagement/Create', [
            'selectedTab' => $request->input('tab'),
            'permissions' => Permission::get(),
        ]);
    }

    /**
     * RolePermission store
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function store(Request $request)
    {
        $vars = $request->validate([
            'name' => ['required', 'max:50', 'unique:roles'],
            'description' => ['nullable', 'max:100'],
            'permissions' => ['array'],
        ]);

        $role = Role::create([
            'name' => $vars['name'],
            'description' => $vars['description'],
            'guard_name' => 'admin',
        ]);

        $this->setPermission($role, $vars['permissions']);

        return to_route('admin.accounts.roles.index')
            ->with('success', 'Saved!');
    }

    private function setPermission(Role $role, $permissions)
    {
        $newPermissions = [];

        foreach ($permissions as $permissionId => $value) {
            if ($value === true) {
                if ($permission = Permission::find($permissionId)) {
                    $newPermissions[] = $permission;
                }
            }
        }

        $role->syncPermissions($newPermissions);
    }

    /**
     * RolePermission delete
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function delete(Request $request, Role $role)
    {
        $role->delete();

        return to_route('admin.accounts.roles.index')
            ->with('success', 'Deleted!');
    }

    /**
     * RolePermission restore
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function restore(Request $request)
    {
        Role::withTrashed()->findOrFail($request->id)->restore();

        return to_route('admin.accounts.roles.index')
            ->with('success', 'Restored!');
    }
}
