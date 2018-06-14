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

//Routes for Tasks
Route::get('/tasks/create','TasksController@create')->name('tasks.create');
Route::post('/tasks/store','TasksController@store')->name('tasks.store');
Route::get('/tasks/get/{any}','TasksController@get')->name('tasks.get');
Route::get('/tasks', 'TasksController@index')->name('tasks.index');
//Routes for Tags
Route::get('/tags/create','TagsController@create')->name('tags.create');
Route::post('tags/store','TagsController@store')->name('tags.store');
Route::get('tags/get/{any}','TagsController@get')->name('tags.get');
Route::get('/tags','TagsController@index')->name('tags.index');

