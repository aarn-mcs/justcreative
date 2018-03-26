<?php

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

Route::get('/home', 'HomeController@index')->name('home');
//task
Route::get('/task', 'TaskController@index')->name('task');
Route::get('/task/detail', 'TaskController@index')->name('taskDetail');
Route::get('/task/change/{id}', 'TaskController@change')->name('change');
Route::get('/task/end/{id}', 'TaskController@endTask')->name('endTask');
Route::post('/task/add', 'TaskController@add')->name('addTask');
//profile
Route::get('/profile', 'ProfileController@index')->name('profile');

