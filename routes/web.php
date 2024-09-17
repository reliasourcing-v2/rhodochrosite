<?php

use App\Models\CmsPage;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\User\Application\ApplicationController;
use App\Http\Controllers\User\Articles\ArticleController;
use App\Http\Controllers\User\Computation\ComputationController;
use App\Http\Controllers\User\Inquiry\InquiryController;
use App\Http\Controllers\User\ModularController;
use App\Http\Controllers\User\PageController;
use App\Http\Controllers\User\Subscription\SubscriptionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/admin', function () {
    return redirect('/admin/login');
});

Route::get('/about-us', function () {
    return redirect('/about-us/our-advantages');
});

Route::post('ckeditor/upload', [CkeditorController::class, 'upload']);

Route::get('/stylesheet', function () {
    return Inertia::render('Stylesheet/Partials/SSContent');
});

Route::prefix('/')
    ->name('pages.')
    ->controller(PageController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/pages/{parentPage:slug}', 'parentPage')->name('parent-page');
        Route::get('/pages/{parentPage:slug}/{subPage:slug}', 'subPage')->name('sub-page');
        Route::get('/pages/{parentPage:slug}/{subPage:slug}/{childPage:slug}', 'childPage')->name('child-page');
        
        Route::get('/industries/saas', 'saas')->name('saas');
        Route::get('/industries/finance', 'finance')->name('finance');
        Route::get('/industries/gaming', 'gaming')->name('gaming');
        Route::get('/industries/e-commerce', 'ecommerce')->name('ecommerce');
        Route::get('/calculator', 'calculator')->name('calculator');
        Route::get('/calculator/view', 'calculatorView')->name('calculator-view');
        Route::get('/careers', 'careers')->name('careers');
        // Route::get('/resources', 'resources')->name('resources');
        // Route::get('/resources/view', 'resourcesView')->name('resources-view');
        Route::get('/contact-us', 'contactUs')->name('contact-us');
        Route::get('/privacy-policy', 'privacyPolicy')->name('privacy-policy');
        Route::get('/terms-and-conditions', 'termsAndConditions')->name('terms-and-conditions');
    });

Route::prefix('/resources')
    ->name('resources.')
    ->controller(ArticleController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{article:slug}', 'show')->name('show');
    });

Route::prefix('/inquiry')
    ->name('inquiry.')
    ->controller(InquiryController::class)
    ->group(function () {
        Route::post('submit', 'submit')->name('submit');
});

Route::prefix('/subscription')
    ->name('subscription.')
    ->controller(SubscriptionController::class)
    ->group(function () {
        Route::post('submit', 'submit')->name('submit');
});

Route::prefix('/application')
    ->name('application.')
    ->controller(ApplicationController::class)
    ->group(function () {
        Route::post('submit', 'submit')->name('submit');
});

Route::prefix('/computation')
    ->name('computation.')
    ->controller(ComputationController::class)
    ->group(function () {
        Route::post('submit', 'submit')->name('submit');
});