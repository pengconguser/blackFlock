<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\UserRequest;
use Illuminate\Support\Facades\DB;
use App\User;

class UsersController extends Controller
{
    public function store(UserRequest $request)
    {
    	$table_captcha=DB::table('cache')->where('key',$request->phone)->first();
        if($request->captcha == $table_captcha->value){
           $user =new User($request->except('captcha'));
           $user->password =bcrypt($user->password);
           $user->save();
           return '注册成功';
        }else{
        	return response('验证码错误',403);
        }
    }
}
