
<?php

namespace App\Http\Controllers;

use App\Chat;
use Illuminate\Http\Request;
use App\User;
use SwooleTW\Http\Websocket\Facades\Websocket;

class swooleMassageController extends Controller
{
    public function main(Request $request, Websocket $webwebsocket)
    {
        //监听客户端发送的send Massage
        $massage = $request->get('massage');
        $chatId  = $request->get('chatId');
        $with_id = $request->get('withId');

        $user = $request->user();
        $with_user=User::findOrFail($with_id);

        //检查聊天室是否创建 默认单人私聊
        // if ($request->chatIds) {
        //     $chat          = new Chat();
        //     $chat->name =$request->chatName?:$user->name.'和'$with_user->name.'的聊天室';
        //     $chat->userIds = [
        //         $user->id,
        //         $with_id,
        //     ];

        //     $chat->save();
        // }

        //向客户端发送更新消息

        $webwebsocket->emit($massage, $data);

    }
}
