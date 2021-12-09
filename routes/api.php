<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\EventController;
use App\Http\Controllers\api\v1\ForumController;
use App\Http\Controllers\api\v1\AnswerController;
use App\Http\Controllers\api\v1\ReportController;
use App\Http\Controllers\api\v1\LandmarkController;
use App\Http\Controllers\api\v1\ReportAnswerController;

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


Route::post(
    '/v1/login',
    [
        App\Http\Controllers\api\v1\AuthController::class,
        'login'
    ]
)->name('api.login');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post(
        '/v1/logout',
        [
            App\Http\Controllers\api\v1\AuthController::class,
            'logout'
        ]
    )->name('api.logout');
    Route::apiResource('v1/answers', AnswerController::class);
    Route::apiResource('v1/events', EventController::class);
    Route::apiResource('v1/forums', ForumController::class);
    Route::apiResource('v1/landmarks', LandmarkController::class);
    Route::apiResource('v1/reports', ReportController::class);
    Route::apiResource('v1/answer_reports', ReportAnswerController::class);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    
});
