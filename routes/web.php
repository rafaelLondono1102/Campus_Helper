<?php

use App\Http\Controllers\LandmarkController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Report_answersController;

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
Auth::routes(['verify' => true]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/info/forums', [App\Http\Controllers\ForumController::class, 'index'])->name('forums.info');
Route::get('/info/forums/{forums}', [App\Http\Controllers\ForumController::class, 'showInfo'])->name('forum.info');



Route::middleware(['auth'])->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('forums', ForumController::class);
    Route::resource('reports', ReportController::class);
    Route::resource('report_answer', Report_answersController::class);
    Route::get('/report/forum/{forums}', [App\Http\Controllers\ReportController::class, 'createCaseForum'])->name('reports.createcaseforum');
    Route::get('/report/answer/{answer}', [App\Http\Controllers\Report_answersController::class, 'createCaseAnswer'])->name('report_answer.createcaseAnswer');
    Route::resource('answer', AnswerController::class);

    Route::resource('landmarks', LandmarkController::class);
});
