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


Route::get('/','StaticPagesController@home');
Route::get('/help','StaticPagesController@help');
Route::get('/about', 'StaticPagesController@about');

//用户创建与删除
Route::get('/signup','UsersController@create');
Route::resource('/users','UsersController');

//用户登录会话控制
Route::get('login','SessionsController@create')->name('login');
Route::post('login','SessionsController@store')->name('login');
Route::delete('logout','SessionsController@destroy')->name('logout');

//用户动态控制,这里only可以只生成store和destroy方法
Route::resource('statuses', 'StatusesController', ['only' => ['store', 'destroy']]);