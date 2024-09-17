<?php

use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\Admin\Others\ActivityLogsController;
use App\Http\Controllers\Admin\Accounts\AdminController;
use App\Http\Controllers\Admin\Accounts\RolePermissionController;
use App\Http\Controllers\Admin\ApplicationController;
use App\Http\Controllers\Admin\Articles\ArticleController;
use App\Http\Controllers\Admin\ComputationController;
use App\Http\Controllers\Admin\Pricings\PricingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Contents\CmsPageController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\Modular\CardController;
use App\Http\Controllers\Admin\Modular\ChildPageController;
use App\Http\Controllers\Admin\Modular\FrameController;
use App\Http\Controllers\Admin\Modular\ParentPageController;
use App\Http\Controllers\Admin\Modular\SubPageController;
use App\Http\Controllers\Admin\Others\NotificationController;
use App\Http\Controllers\Admin\Others\SettingsController;
use App\Http\Controllers\Admin\SubscriptionController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return redirect()->route('admin.cms.index');
});

Route::get('/stylesheet', function () {
    return Inertia::render('Stylesheet/Partials/SSContent');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::prefix('pages')
        ->name('pages.')
        ->group(function () {

        Route::prefix('parent')
            ->name('parent.')
            ->controller(ParentPageController::class)
            ->group(function () {
                Route::get('index', 'index')->name('index');
                Route::get('edit/{parentPage}', 'edit')->name('edit');
                Route::post('edit/{parentPage}', 'update')->name('update');
                Route::get('create', 'create')->name('create');
                Route::post('store', 'store')->name('store');
                Route::delete('delete/{parentPage}', 'archive')->name('archive');
                Route::post('restore', 'restore')->name('restore');

                // frame
                Route::get('{parentPage}/create/frame', 'createFrame')->name('create-frame');
                Route::post('store/frame/{parentPage}', 'storeFrame')->name('store-frame');
                Route::get('{frame}/edit/frame', 'editFrame')->name('edit-frame');
                Route::post('update/frame/{frame}', 'updateFrame')->name('update-frame');
                Route::delete('delete/frame/{frame}', 'deleteFrame')->name('delete-frame');

                // frame - card
                Route::get('{frame}/create/frame/card', 'createFrameCard')->name('create-frame-card');
                Route::post('store/card/{frame}', 'storeFrameCard')->name('store-frame-card');
                Route::get('{card}/edit/card', 'editFrameCard')->name('edit-frame-card');
                
            });

        Route::prefix('subpage')
            ->name('subpage.')
            ->controller(SubPageController::class)
            ->group(function () {
                Route::get('index', 'index')->name('index');
                Route::get('edit/{subPage}', 'edit')->name('edit');
                Route::post('edit/{subPage}', 'update')->name('update');
                Route::get('{parentPage}/create', 'create')->name('create');
                Route::post('store', 'store')->name('store');
                Route::delete('delete/{subPage}', 'archive')->name('archive');
                Route::post('reorder/page', 'updateOrder')->name('update-order');

                // frame
                Route::get('{subPage}/create/frame', 'createFrame')->name('create-frame');
                Route::post('store/frame/{subPage}', 'storeFrame')->name('store-frame');
                Route::get('{frame}/edit/frame', 'editFrame')->name('edit-frame');
                Route::post('update/frame/{frame}', 'updateFrame')->name('update-frame');
                Route::delete('delete/frame/{frame}', 'deleteFrame')->name('delete-frame');

                // frame - card
                Route::get('{frame}/create/frame/card', 'createFrameCard')->name('create-frame-card');
                Route::post('store/card/{frame}', 'storeFrameCard')->name('store-frame-card');
                Route::get('{card}/edit/card', 'editFrameCard')->name('edit-frame-card');
                Route::post('update/card/{card}', 'updateFrameCard')->name('update-frame-card');
            });

        Route::prefix('child')
            ->name('child.')
            ->controller(ChildPageController::class)
            ->group(function () {
                Route::get('index', 'index')->name('index');
                Route::get('edit/{childPage}', 'edit')->name('edit');
                Route::post('edit/{childPage}', 'update')->name('update');
                Route::get('{subPage}/create', 'create')->name('create');
                Route::post('store', 'store')->name('store');
                Route::delete('delete/{childPage}', 'archive')->name('archive');
                Route::post('restore', 'restore')->name('restore');

                // frame
                Route::get('{childPage}/create/frame', 'createFrame')->name('create-frame');
                Route::post('store/frame/{childPage}', 'storeFrame')->name('store-frame');
                Route::get('{frame}/edit/frame', 'editFrame')->name('edit-frame');
                Route::post('update/frame/{frame}', 'updateFrame')->name('update-frame');
                Route::delete('delete/frame/{frame}', 'deleteFrame')->name('delete-frame');

                // frame - card
                Route::get('{frame}/create/frame/card', 'createFrameCard')->name('create-frame-card');
                Route::post('store/card/{frame}', 'storeFrameCard')->name('store-frame-card');
                Route::get('{card}/edit/card', 'editFrameCard')->name('edit-frame-card');
                Route::post('update/card/{card}', 'updateFrameCard')->name('update-frame-card');
            });

        Route::prefix('frame')
            ->name('frame.')
            ->controller(FrameController::class)
            ->group(function () {
                Route::post('reorder', 'updateOrder')->name('update-order');
                Route::post('reorder/card', 'updateCardOrder')->name('update-card-order');
                Route::delete('delete/card/{item}', 'deleteCard')->name('delete-card');
            });
    });

    /*
    |--------------------------------------------------------------------------
    | ACCOUNTS
    |--------------------------------------------------------------------------
     */
    Route::prefix('accounts')
        ->name('accounts.')
        ->group(function () {

            /** CUSTOMER */
            // Route::prefix('customers')
            //     ->name('customers.')
            //     ->controller(CustomerController::class)
            //     ->group(function () {
            //         Route::middleware(['can:create-customer', 'can:update-customer'])->group(function () {
            //             Route::get('/', 'index')->name('index');
            //             Route::get('create', 'create')->name('create');
            //             Route::get('edit/{id}', 'edit')->name('edit');
            //             Route::post('store', 'store')->name('store');
            //             Route::post('update/{id}', 'update')->name('update');
            //             Route::get('manifest', 'manifest')->name('manifest');
            //             Route::get('export', 'export')->name('export');
            //             Route::post('import', 'import')->name('import');
            //         });
            //         Route::middleware(['can:archive-customer', 'can:restore-customer'])->group(function () {
            //             Route::get('index?tab=archived', 'index')->name('index-archived');
            //             Route::delete('archive/{id}', 'archive')->name('archive');
            //             Route::patch('restore/{id}', 'restore')->name('restore');
            //         });
            //     });

            /** ADMIN */
            Route::prefix('admins')
                ->name('admins.')
                ->controller(AdminController::class)
                ->group(function () {
                    Route::get('index', 'index')->name('index');
                    Route::get('view/{admin}', 'view')->name('view');
                    Route::get('create', 'create')->name('create');
                    Route::get('edit/{admin}', 'edit')->name('edit');
                    Route::post('store', 'store')->name('store');
                    Route::post('edit/{admin}', 'update');
                    Route::delete('delete/{admin}', 'delete')->name('delete');
                    Route::post('restore}', 'restore')->name('restore');
                    Route::get('search/{q}', 'search')->name('search');
                    Route::get('export', 'export')->name('export');
                    Route::get('manifest', 'manifest')->name('manifest');
                    Route::post('import', 'import')->name('import');
                });

            /** ROLES */
            Route::prefix('roles')
                ->name('roles.')
                ->controller(RolePermissionController::class)
                ->group(function () {
                    Route::get('index', 'index')->name('index');
                    Route::get('view/{role}', 'view')->name('view');
                });
        });

    /*
    |--------------------------------------------------------------------------
    | OTHERS
    |--------------------------------------------------------------------------
    */
    Route::prefix('article-management')
        ->name('article-management.')
        ->group( function() {

            Route::prefix('articles')
            ->name('articles.')
            ->controller(ArticleController::class)
            ->group(function () {
                Route::get('index', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::get('edit/{article}', 'edit')->name('edit');
                Route::post('update/{article}', 'update')->name('update');
                Route::post('store', 'store')->name('store');
                Route::delete('archive/{article}', 'archive')->name('archive');
                Route::post('restore', 'restore')->name('restore');
            });
           
    });
    Route::prefix('pricing-management')
        ->name('pricing-management.')
        ->group( function() {

            Route::prefix('pricings')
            ->name('pricings.')
            ->controller(PricingController::class)
            ->group(function () {
                Route::get('index', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::get('edit/{pricing}', 'edit')->name('edit');
                Route::post('update/{pricing}', 'update')->name('update');
                Route::post('store', 'store')->name('store');
                Route::delete('archive/{pricing}', 'archive')->name('archive');
                Route::post('restore', 'restore')->name('restore');
            });
           
    });

    Route::prefix('settings')
        ->name('settings.')
        ->controller(SettingsController::class)
        ->group(function () {
            Route::get('index', 'index')->name('index');
        });

    Route::prefix('activity-logs')
        ->name('activity-logs.')
        ->controller(ActivityLogsController::class)
        ->middleware('can:manage-activity-logs')
        ->group(function () {
            Route::get('index', 'index')->name('index');
        });

    Route::prefix('notification')
        ->name('notification.')
        ->controller(NotificationController::class)
        ->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('show/{id}', 'show')->name('show');
            Route::patch('read-all', 'readAll')->name('read-all');
        });

    Route::prefix('cms')
        ->name('cms.')
        ->controller(CmsPageController::class)
        ->group(function () {
            Route::get('index', 'index')->name('index');
            Route::get('edit/{cmsPage}', 'edit')->name('edit');
            Route::post('edit/{cmsPage}', 'update');
        });

    Route::post('ckeditor/upload', [CkeditorController::class, 'upload']);

    Route::prefix('contact')
        ->name('contact.')
        ->group(function () {

            Route::prefix('inquiries')
                ->name('inquiries.')
                ->controller(InquiryController::class)
                ->group(function () {
                    Route::get('index', 'index')->name('index');
                    Route::get('view/{inquiry}', 'view')->name('view');
                    Route::delete('delete/{inquiry}', 'delete')->name('delete');
                    Route::post('restore', 'restore')->name('restore');
                });

            Route::prefix('subscriptions')
                ->name('subscriptions.')
                ->controller(SubscriptionController::class)
                ->group(function () {
                    Route::get('index', 'index')->name('index');
                    Route::get('view/{subscription}', 'view')->name('view');
                    Route::delete('delete/{subscription}', 'delete')->name('delete');
                    Route::post('restore', 'restore')->name('restore');
                });
        });

        Route::prefix('application')
            ->name('application.')
            ->controller(ApplicationController::class)
            ->group(function () {
                Route::get('index', 'index')->name('index');
                Route::get('view/{application}', 'view')->name('view');
                Route::delete('delete/{application}', 'delete')->name('delete');
                Route::post('restore', 'restore')->name('restore');
            });

        Route::prefix('computation')
            ->name('computation.')
            ->controller(ComputationController::class)
            ->group(function () {
                Route::get('index', 'index')->name('index');
                Route::get('view/{computation}', 'view')->name('view');
                Route::delete('delete/{computation}', 'delete')->name('delete');
                Route::post('restore', 'restore')->name('restore');
            });
        
});
