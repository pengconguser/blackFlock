<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redis;

class socketController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('socket.socket');
    }

    public function writeMessage()
    {
        return view('socket.writemessage');
    }

    public function sendMessage(Request $request)
    {
        $redis = Redis::connection();
        $redis->publish('message', $request->massage);
        return redirect('socket.writemessage');
    }
}
