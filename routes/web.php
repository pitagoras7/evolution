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
    return view('home');
});





Route::get('admin/user',['uses'=>'UserController@index']);

Route::post('admin/login',['uses'=>'UserController@login']);

Route::get('admin/users/create',['uses'=>'UserController@create']);

Route::get('admin/users/create',['uses'=>'UserController@create']);

Route::resource('admin/users', 'UserController');

Route::resource('admin/tasks', 'TaskController');

Route::get('task',['uses'=>'TaskController@index']);

Route::get('task/externo',['uses'=>'TaskController@externo']);

Route::get('task/list',['uses'=>'TaskController@listAll']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
