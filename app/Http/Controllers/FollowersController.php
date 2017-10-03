<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Auth;

class FollowersController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}
    public function store(User $user)
    {
     if(Auth::user()->id === $user->id)//检查当前用户是否自己关注自己,如果自己关注自己直接就给定向到首页去.
     {
     	 return redirect('/');
     }

     if (!Auth::user()->isFollowing($user->id)) //检查用户是否已经关注了这个人
     	{
            Auth::user()->follow($user->id);
        }

      return redirect()->route('users.show', $user->id);
    }

    public function destroy(User $user)//取消关注的函数
    {
       if (Auth::user()->id === $user->id) {//确认取关的不是自己
            return redirect('/');
        }

       if (Auth::user()->isFollowing($user->id)) {  //判断当前取关的对象是否已经在关注 如果不在不会执行取关操作.
            Auth::user()->unfollow($user->id);
        }

        return redirect()->route('users.show', $user->id);
    }
}
