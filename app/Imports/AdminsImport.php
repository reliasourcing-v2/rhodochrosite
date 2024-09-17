<?php

namespace App\Imports;

use App\Imports\Traits\RendersFailure;
use App\Models\Admin;
use App\Models\Department;
use App\Notifications\Admins\Welcome;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class AdminsImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure, SkipsEmptyRows
{
    use Importable, SkipsFailures, RendersFailure;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $department = Department::find(explode(' - ', $row['Department'])[0]);

        $admin = new Admin([
            'first_name' => $row['First Name'],
            'last_name' => $row['Last Name'],
            'email' => $row['Email'],
            'title' => $row['Job Title'],
            'department_id' => $department?->id,
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make(Str::random(24)),
        ]);

        Password::broker('admins')->sendResetLink([
            'email' => $admin->email,
        ], function ($user, $token) {
            $user->notify(new Welcome($token));
        });

        return $admin;
    }

    public function rules(): array
    {
        return [
            'First Name' => ['required', 'max:50'],
            'Last Name' => ['required', 'max:50'],
            'Email' => ['required', 'max:50', 'email', 'unique:admins'],
            'Job Title' => ['required', 'max:50'],
            'Department' => ['required'],
        ];
    }
}
