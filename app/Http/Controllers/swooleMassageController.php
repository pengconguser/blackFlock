
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SwooleTW\Http\Websocket\Facades\Websocket;
use App\Chat;

class swooleMassageController extends Controller
{
    public function main(Request $request,Websocket $webwebsocket)
    {
    	//监听客户端发送的send Massage
    	$massage=$request->get('massage');
    	$chatId=$request->get('chatId');
    	$with_id=$request->get('withId');

    	$user=$request->user();

    	if($request->chatIds){
    		$chat= new Chat();
    		$chat->userIds=[];
    	}

    	$webwebsocket->emit($massage,$data);

    }
}
