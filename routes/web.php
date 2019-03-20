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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('/list', 'ListsController')->except([
    'index'
]);
Route::resource('/task', 'TasksController')->except([
    'create',
    'edit'
]);
Route::get('/', 'ListsController@index')->name('index');
Route::get('/list/{list}/add', 'TasksController@create')->name('task.create');
Route::get('/list/{list}/edit/{task}', 'TasksController@edit')->name('task.edit');

Auth::routes();

// Route::get('/home', 'HomeController@index');
