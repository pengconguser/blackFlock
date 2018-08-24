<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});

Route::post('/save/image', 'Api\ImageController@save')->name('article.upload_image');

//ArticleCommend
Route::get('/article/commend','Api\ArticleController@commend');

Route::post('/captcha','Api\SmsController@post_msg');

//phone user
Route::post('/user/store','Api\UsersController@store');

 //chat api
Route::get('/chats','Api\ChatController@getChats');

//验证api服务器 用于登陆验证
Route::post('/check-user','Api\CheckController@check_user');

