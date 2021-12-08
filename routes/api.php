<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\AnswerController;

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
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    
});
