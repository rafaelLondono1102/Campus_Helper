<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ReportController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('forums', ForumController::class);
    Route::resource('reports', ReportController::class);
    Route::get('/report/{forums}', [App\Http\Controllers\ReportController::class, 'createCaseForum'])->name('reports.createcaseforum');
    Route::get('/report/{answer}', [App\Http\Controllers\ReportController::class, 'createCaseAnswer'])->name('reports.createcaseasnwer');
    Route::resource('answer', AnswerController::class);
});
