<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\User\Inquiry\InquiryController;
use App\Http\Controllers\User\Subscription\SubscriptionController;
use App\Http\Controllers\User\Application\ApplicationController;
use App\Http\Controllers\User\Computation\ComputationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/cms-header', [ApiController::class, 'getCmsHeader']);
Route::get('/cms-footer', [ApiController::class, 'getCmsFooter']);
Route::get('/parent-pages', [ApiController::class, 'getParentPages']);
Route::get('/pages', [ApiController::class, 'getPages']);
Route::get('/page/{slug}', [ApiController::class, 'getPage']);
Route::get('/parent-page/{slug}', [ApiController::class, 'getParentPage']);
Route::get('/sub-page/{slug}', [ApiController::class, 'getSubPage']);
Route::get('/child-page/{slug}', [ApiController::class, 'getChildPage']);
Route::get('/pricing-items', [ApiController::class, 'getPricingItems']);

Route::get('/articles', [ApiController::class, 'getArticles']);
Route::get('/articles/{slug}', [ApiController::class, 'getArticle']);

Route::post('/inquiry', [InquiryController::class, 'submit']);
Route::post('/subscription', [SubscriptionController::class, 'submit']);
Route::post('/application', [ApplicationController::class, 'submit']);
Route::post('/computation', [ComputationController::class, 'submit']);

Route::get('/api/test', function() {
    return response()->json(['message' => 'API is working']);
});
