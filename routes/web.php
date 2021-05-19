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

Route::get('/','TaskController@index');
Route::get('/home','Taskcontroller@show');
Route::get('/tasks','Taskcontroller@create');
Route::post('/task/create','Taskcontroller@store');
Route::get('/task/edit/{id}','Taskcontroller@edit');
Route::post('/task/update','Taskcontroller@update');
Route::post('/task/delete','Taskcontroller@destroy');
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
