<?php

namespace App\Http\Controllers\Api;

use App\gtPHP\GeetestLib;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckController extends Controller
{
    public function get_user(Request $request)
    {
        $getPhp = new GeetestLib(config('checkUser.CAPTCHA_ID'), config('checkUser.PRIVATE_KEY'));

        $ip=$request->getClientIp();

        session_start();

        $data = [
            "user_id"     => 1, # 网站用户id
            "client_type" => "web", #web:电脑上的浏览器；h5:手机上的浏览器，包括移动应用内完全内置的web_view；native：通过原生SDK植入APP应用的方式
            "ip_address"  => $ip, # 请在此处传输用户请求验证时所携带的IP
        ];

        $status               = $getPhp->pre_process($data, 1);
        $_SESSION['gtserver'] = $status;
        $_SESSION['user_id']  = $data['user_id'];

        return $getPhp->get_response_str();
    }

    public function check_user(Request $request)
    {

    }
}
