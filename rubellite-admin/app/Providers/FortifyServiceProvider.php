<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\CreateNewAdmin;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Http\Responses\AdminFailedTwoFactorLoginResponse;
use App\Http\Responses\AdminPasswordResetResponse;
use App\Http\Responses\AdminTwoFactorLoginResponse;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Contracts\FailedTwoFactorLoginResponse;
use Laravel\Fortify\Contracts\PasswordResetResponse;
use Laravel\Fortify\Contracts\TwoFactorLoginResponse;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Invoke Admin Guards
        if (request()->is('admin/*')) {
            $this->bootAdmin();
        } else {
            Fortify::createUsersUsing(CreateNewUser::class);
        }


        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)->by($request->email . $request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    protected function bootAdmin()
    {
        config(['fortify.passwords' => 'admins']);
        config(['fortify.guard' => 'admin']);
        config(['fortify.prefix' => 'admin']);
        config(['fortify.home' => RouteServiceProvider::ADMIN_HOME]);
        config(['sanctum.guard' => 'admin']);

        config(['session.table' => 'admin_sessions']);

        Fortify::createUsersUsing(CreateNewAdmin::class);

        Fortify::loginView(function () {
            return Inertia::render('Admin/Auth/Login', [
                'canResetPassword' => Route::has('password.request'),
                'status' => session('status'),
            ]);
        });

        Fortify::requestPasswordResetLinkView(function () {
            return Inertia::render('Admin/Auth/ForgotPassword', [
                'status' => session('status'),
            ]);
        });

        Fortify::resetPasswordView(function (Request $request) {
            return Inertia::render('Admin/Auth/ResetPassword', [
                'email' => $request->input('email'),
                'token' => $request->route('token'),
            ]);
        });

        Fortify::registerView(function () {
            return Inertia::render('Admin/Auth/Register');
        });

        Fortify::verifyEmailView(function () {
            return Inertia::render('Admin/Auth/VerifyEmail', [
                'status' => session('status'),
            ]);
        });

        Fortify::twoFactorChallengeView(function () {
            return Inertia::render('Admin/Auth/TwoFactorChallenge');
        });

        Fortify::confirmPasswordView(function () {
            return Inertia::render('Admin/Auth/ConfirmPassword');
        });

        ResetPassword::createUrlUsing(function ($user, string $token) {
            return route('admin.password.update') . "/{$token}?email={$user->email}";
        });

        $this->app->singleton(PasswordResetResponse::class, AdminPasswordResetResponse::class);
        $this->app->singleton(FailedTwoFactorLoginResponse::class, AdminFailedTwoFactorLoginResponse::class);
        $this->app->singleton(TwoFactorLoginResponse::class, AdminTwoFactorLoginResponse::class);
    }
}
