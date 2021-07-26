<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\TaskController;

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

Route::get('/', 'App\Http\Controllers\TaskController@index');
Route::get('/tasks/activetasks', 'App\Http\Controllers\TaskController@activeTasks')->name('activetasks');
Route::get('/tasks/completedtasks', 'App\Http\Controllers\TaskController@completedTasks')->name('completedtasks');

Route::resource('/tasks', 'App\Http\Controllers\TaskController');

Route::get('/tasks', 'App\Http\Controllers\TaskController@index')->name('all');
Route::get('/tasks/{task}/active', 'App\Http\Controllers\TaskController@active')->name('active');
Route::get('/tasks/{task}/completed', 'App\Http\Controllers\TaskController@completed')->name('completed');


