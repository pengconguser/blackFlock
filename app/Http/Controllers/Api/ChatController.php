<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Chat;

class ChatController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth:api');
	}

    public function getChats(Request $request)
    {
    	$user=$request->user();

        return $user;

    	Chat::chunk(100,function($chats){
    		 foreach($chats as $chat){

    		 }
    	});
    }
}
