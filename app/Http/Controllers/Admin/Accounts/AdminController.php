<?php

namespace App\Http\Controllers\Admin\Accounts;

use App\Exports\AdminManifestExport;
use App\Http\Controllers\Controller;
use App\Imports\AdminsImport;
use App\Mail\AdminsExportEmail;
use App\Models\Admin;
// use App\Models\Department;
use App\Models\Role;
use App\Notifications\Admins\Welcome;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    /**
     * Admin index
     *
     * @return \Inertia\Response
     */
    public function index(Request $request)
    {
        $admins = Admin::query();

        $tab = $request->input('tab');
        $date = $request->input('date');

        # Search
        if ($request->input('query')) {
            // $search_query = Admin::search($request->input('query'));
            $search_query = Admin::where('first_name', 'like', "%{$request->input('query')}%")
                ->orWhere('last_name', 'like', "%{$request->input('query')}%")
                ->orWhere('email', 'like', "%{$request->input('query')}%")
                ->orWhere('title', 'like', "%{$request->input('query')}%");

            // Filter tab
            if ($request->tab === 'archived') {
                $search_query = $search_query->onlyTrashed();
            }

            $ids = $search_query->get()->pluck('id');
            $admins = $admins->whereIn('id', $ids);
        }

        // $admins = $admins->with('department:id,name');

        # Tab
        if ($tab === 'archived') {
            $admins = $admins->onlyTrashed();
        }

        # Date
        if ($date) {
            $admins = $admins->whereBetween('created_at', [
                Carbon::parse($date)->startOfDay(),
                Carbon::parse($date)->endOfDay()
            ]);
        }

        // Setup pagination
        $admins = $admins->with('role')->paginate($request->input('rows') ?: 10)->appends(request()->query());

        // Process counts
        $active_count = Admin::count();
        $archived_count = Admin::onlyTrashed()->count();

        return Inertia::render('Admin/AdminManagement/Index', [
            'items' => $admins,
            'archived' => Admin::whereNotNull('deleted_at')->get(),
            'activeCount' => $active_count,
            'archivedCount' => $archived_count,
            'query' => $request->input('query'), // return search query
            'selectedTab' => $request->input('tab'), // return selected tab
            'filterDate' => $date
        ]);
    }

    public function view(Admin $admin)
    {
        return Inertia::render('Admin/AdminManagement/View', [
            'admin' => $admin,
            'roles' => Role::renderSelect()
        ]);
    }

    /**
     * Admin create
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Admin/AdminManagement/Create', [
            'roles' => Role::renderSelect()
        ]);
    }

    /**
     * Admin edit
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function edit(Admin $admin)
    {
        return Inertia::render('Admin/AdminManagement/Edit', [
            'admin' => $admin,
            'roles' => Role::renderSelect()
        ]);
    }

    /**
     * Admin store
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function store(Request $request)
    {
        $vars = $request->validate([
            'first_name' => ['required', 'max:50'],
            'last_name' => ['required', 'max:50'],
            'title' => ['required', 'max:50'],
            'role_id' => ['required'],
            'email' => ['required', 'max:50', 'email', 'unique:admins'],
        ]);

        $vars['email_verified_at'] = Carbon::now();
        $vars['password'] = Hash::make(Str::random(24));

        $admin = Admin::create($vars);

        Password::broker('admins')->sendResetLink([
            'email' => $admin->email,
        ], function ($user, $token) {
            $user->notify(new Welcome($token));
        });

        return redirect()
            ->route('admin.accounts.admins.index')
            ->with('success', 'Saved!');
    }

    /**
     * Admin update
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $vars = $request->validate([
            'first_name' => ['required', 'max:50'],
            'last_name' => ['required', 'max:50'],
            'title' => ['required', 'max:50'],
            'email' => ['required', 'max:50', 'email', 'unique:admins,email,' . $admin->id],
            'role_id' => ['required'],
        ]);

        $admin->update($vars);

        return redirect()
            ->route('admin.accounts.admins.index')
            ->with('success', 'Saved!');
    }

    /**
     * Admin delete
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function delete(Request $request, Admin $admin)
    {
        $admin->delete();

        return redirect()
            ->route('admin.accounts.admins.index')
            ->with('success', 'Deleted!');
    }

    /**
     * Admin restore
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function restore(Request $request)
    {
        Admin::withTrashed()->find($request->id)->restore();

        return redirect()
            ->route('admin.accounts.admins.index')
            ->with('success', 'Restored!');
    }

    public function export(Request $request)
    {
        $admins = Admin::query();

        // Handle search requests
        if ($request->input('query')) {
            $search_query = Admin::search($request->input('query'));

            // Filter tab
            if ($request->tab === 'archived') {
                $search_query = $search_query->onlyTrashed();
            }

            $ids = $search_query->get()->pluck('id');
            $admins = $admins->whereIn('id', $ids);
        }

        // $admins = $admins->with('department:id,name');

        // Filter tab
        if ($request->tab === 'archived') {
            $admins = $admins->onlyTrashed();
        }

        Mail::to($request->user())->send(new AdminsExportEmail($admins));

        return redirect()
            ->route('admin.accounts.admins.index')
            ->with('success', 'Admin export successfully sent to your email!');
    }

    public function manifest(Request $request)
    {
        return Excel::download(new AdminManifestExport, 'admins_manifest.xlsx');
    }

    public function import(Request $request)
    {
        if ($request->hasFile('file')) {
            $import = new AdminsImport;
            $import->import($request->file('file'));

            if ($import->hasFailure()) {
                return to_route('admin.accounts.admins.index')
                    ->with('danger', $import->failuresHtml());
            } else {
                return to_route('admin.accounts.admins.index')
                    ->with('success', 'File successfully imported to admins!');
            }
        } else {
            return to_route('admin.accounts.admins.index')
                ->with('warning', 'No file to import.');
        }
    }
}
