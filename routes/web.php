<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', 'App\Http\Controllers\HomeController@index')->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/game', 'App\Http\Controllers\GameController@index')->name('game');
    
Route::middleware(['auth:sanctum', 'verified'])->get('/game/lesson/{id}', 'App\Http\Controllers\GameController@getLesson');
Route::middleware(['auth:sanctum', 'verified'])->get('/game/level/{id}', 'App\Http\Controllers\GameController@getLevel');
Route::middleware(['auth:sanctum', 'verified'])->get('/game/task/{id}', 'App\Http\Controllers\GameController@getTask');
Route::middleware(['auth:sanctum', 'verified'])->post('/game/solution/{id}', 'App\Http\Controllers\GameController@getSolution');

Route::group(['middleware' => 'admin'], function () {
    Route::middleware(['auth:sanctum', 'verified'])->get('/tasks/index/{id}/{complexity}', 'App\Http\Controllers\TasksController@index')->name('tasks');
    Route::middleware(['auth:sanctum', 'verified'])->get('/tasks/show/{id}', 'App\Http\Controllers\TasksController@show');
    Route::middleware(['auth:sanctum', 'verified'])->get('/tasks/delete/{id}', 'App\Http\Controllers\TasksController@destroy');
    Route::middleware(['auth:sanctum', 'verified'])->get('/tasks/create', 'App\Http\Controllers\TasksController@create')->name('tasks/create');
    Route::middleware(['auth:sanctum', 'verified'])->post('/tasks/store', 'App\Http\Controllers\TasksController@store');
    Route::middleware(['auth:sanctum', 'verified'])->get('/tasks/edit/{id}', 'App\Http\Controllers\TasksController@edit');
    Route::middleware(['auth:sanctum', 'verified'])->put('/tasks/update/{id}', 'App\Http\Controllers\TasksController@update');

    Route::middleware(['auth:sanctum', 'verified'])->get('/lessons/index', 'App\Http\Controllers\LessonsController@index')->name('lessons');
    Route::middleware(['auth:sanctum', 'verified'])->get('/lessons/delete/{id}', 'App\Http\Controllers\LessonsController@destroy');
    Route::middleware(['auth:sanctum', 'verified'])->get('/lessons/create', 'App\Http\Controllers\LessonsController@create')->name('lessons/create');
    Route::middleware(['auth:sanctum', 'verified'])->post('/lessons/store', 'App\Http\Controllers\LessonsController@store');
    Route::middleware(['auth:sanctum', 'verified'])->get('/lessons/edit/{id}', 'App\Http\Controllers\LessonsController@edit');
    Route::middleware(['auth:sanctum', 'verified'])->put('/lessons/update/{id}', 'App\Http\Controllers\LessonsController@update');

    Route::middleware(['auth:sanctum', 'verified'])->get('/levels/index/{id}', 'App\Http\Controllers\LevelsController@index')->name('levels');
    Route::middleware(['auth:sanctum', 'verified'])->get('/levels/delete/{id}', 'App\Http\Controllers\LevelsController@destroy');
    Route::middleware(['auth:sanctum', 'verified'])->get('/levels/create', 'App\Http\Controllers\LevelsController@create')->name('levels/create');
    Route::middleware(['auth:sanctum', 'verified'])->post('/levels/store', 'App\Http\Controllers\LevelsController@store');
    Route::middleware(['auth:sanctum', 'verified'])->get('/levels/edit/{id}', 'App\Http\Controllers\LevelsController@edit');
    Route::middleware(['auth:sanctum', 'verified'])->put('/levels/update/{id}', 'App\Http\Controllers\LevelsController@update');

    Route::middleware(['auth:sanctum', 'verified'])->get('/levellevel/store/{id}/{id_lesson}/{array}', 'App\Http\Controllers\LevelLevelController@store');
});