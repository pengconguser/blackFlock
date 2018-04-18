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

Route::get('/', 'StaticPagesController@home');
Route::get('/help', 'StaticPagesController@help');
Route::get('/about', 'StaticPagesController@about');

//用户创建与删除
Route::get('/signup', 'UsersController@create');
Route::resource('/users', 'UsersController');

//用户登录会话控制
Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');

//用户动态控制,这里only可以只生成store和destroy方法
Route::resource('statuses', 'StatusesController', ['only' => ['store', 'destroy']]);
//小社区里用户的个人资料show页面
Route::get('/article/user', 'ArticleController@show_user')->name('user.article');

//用户关注情况的路由
Route::get('/users/{user}/followings', 'UsersController@followings')->name('users.followings'); //显示用户关注的人列表
Route::get('/users/{user}/followers', 'UsersController@followers')->name('users.followers'); //显示用户的粉丝列表

//用户关注与取消关注的路由
Route::post('/users/followers/{user}', 'FollowersController@store')->name('followers.store');
Route::delete('/users/followers/{user}', 'FollowersController@destroy')->name('followers.destroy');

//小博客模块,用来记录我自己写的一些小博客
Route::resource('/article', 'ArticleController');
Route::post('/article/save', 'ArticleController@image_save')->name('article.upload_image');

//search
Route::get('/search','SearchController@search');

//小游戏控制器
Route::resource('/game', 'GamesController');

//category resource
Route::resource('/category', 'CategoryController');

//comment resource
Route::resource('/comment', 'CommentController', ['only' => ['store', 'destroy']]);

//message notice
Route::resource('notifications', 'NotificationsController', ['only' => ['index']]);


//Socket
Route::get('/socket','socketController@index');
Route::get('/socket/massage','socketController@writeMessage');
Route::post('/socket/massage','socketController@sendMessage')->name('sendMassage');