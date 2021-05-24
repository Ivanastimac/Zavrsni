<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect('/instructions');
})->name('dashboard');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware(['auth:sanctum', 'verified'])->get('/study', 'App\Http\Controllers\StudyController@index')->name('study');
Route::middleware(['auth:sanctum', 'verified'])->get('/study/lesson/{id}', 'App\Http\Controllers\StudyController@getLesson');
Route::middleware(['auth:sanctum', 'verified'])->get('/study/level/{id}', 'App\Http\Controllers\StudyController@getLevel');
Route::middleware(['auth:sanctum', 'verified'])->get('/study/task/{id}', 'App\Http\Controllers\StudyController@getTask');
Route::middleware(['auth:sanctum', 'verified'])->post('/study/solution/{id}', 'App\Http\Controllers\StudyController@getSolution');

Route::middleware(['auth:sanctum', 'verified'])->get('/instructions', 'App\Http\Controllers\InstructionsController@index')->name('instructions');

Route::middleware(['auth:sanctum', 'verified'])->get('/game', 'App\Http\Controllers\GameController@index')->name('game');
Route::middleware(['auth:sanctum', 'verified'])->get('/game/lesson/{id}', 'App\Http\Controllers\GameController@getLesson');
Route::middleware(['auth:sanctum', 'verified'])->get('/game/task/{id}', 'App\Http\Controllers\GameController@getTask');
Route::middleware(['auth:sanctum', 'verified'])->post('/game/solution/{id}', 'App\Http\Controllers\GameController@getSolution');

Route::group(['middleware' => 'admin'], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/tasks/index/{id}', 'App\Http\Controllers\TasksController@index')->name('tasks');
    Route::middleware(['auth:sanctum', 'verified'])->get('/tasks/show/{id}', 'App\Http\Controllers\TasksController@show');
    Route::middleware(['auth:sanctum', 'verified'])->get('/tasks/delete/{id}', 'App\Http\Controllers\TasksController@destroy');
    Route::middleware(['auth:sanctum', 'verified'])->get('/tasks/create', 'App\Http\Controllers\TasksController@create')->name('tasks/create');
    Route::middleware(['auth:sanctum', 'verified'])->post('/tasks/store', 'App\Http\Controllers\TasksController@store');
    Route::middleware(['auth:sanctum', 'verified'])->get('/tasks/edit/{id}', 'App\Http\Controllers\TasksController@edit');
    Route::middleware(['auth:sanctum', 'verified'])->put('/tasks/update/{id}', 'App\Http\Controllers\TasksController@update');

    Route::middleware(['auth:sanctum', 'verified'])->get('/lessons/index', 'App\Http\Controllers\LessonsController@index')->name('lessons');
    Route::middleware(['auth:sanctum', 'verified'])->get('/lessons/create', 'App\Http\Controllers\LessonsController@create')->name('lessons/create');
    Route::middleware(['auth:sanctum', 'verified'])->post('/lessons/store', 'App\Http\Controllers\LessonsController@store');

    Route::middleware(['auth:sanctum', 'verified'])->get('/levels/index/{id}', 'App\Http\Controllers\LevelsController@index')->name('levels');
    Route::middleware(['auth:sanctum', 'verified'])->get('/levels/create', 'App\Http\Controllers\LevelsController@create')->name('levels/create');
    Route::middleware(['auth:sanctum', 'verified'])->post('/levels/store', 'App\Http\Controllers\LevelsController@store');

    Route::middleware(['auth:sanctum', 'verified'])->get('/levellevel/store/{id}/{id_lesson}/{array}', 'App\Http\Controllers\LevelLevelController@store');
});