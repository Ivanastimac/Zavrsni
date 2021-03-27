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

Route::middleware(['auth:sanctum', 'verified'])->get('/tasks/index', 'App\Http\Controllers\TasksController@index')->name('tasks');
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


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
