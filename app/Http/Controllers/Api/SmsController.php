<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yunpian\Sdk\YunpianClient;
use App\Http\Requests\SmsRequest;

class SmsController extends Controller
{
    public function post_msg(SmsRequest $request)
    {
        //初始化client,apikey作为所有请求的默认值
        $phone  = $request->phone;
        $apikey = env('API_MSG_KEY', "");
        $clnt   = YunpianClient::create($apikey);

        $captcha = rand(1000, 9999);

        // $cachePhone=Cache::get($request->phone); TODO::缓存的使用有点问题 改纯手动数据库驱动
        $cachePhone = DB::table('cache')->where('key', $request->phone)->first();

        if (empty($cachePhone)) {
            $param = [YunpianClient::MOBILE => "$phone", YunpianClient::TEXT => "【黑白路社区】您的验证码是$captcha"];
            $r     = $clnt->sms()->single_send($param);

            if ($r->isSucc()) {
                DB::table('cache')->insert([
                    'key'        => $request->phone,
                    'value'      => $captcha,
                    'expiration' => 5,
                ]);
            }
        }

        return 1;
        
        //var_dump($r);

        //账户$clnt->user() 签名$clnt->sign() 模版$clnt->tpl() 短信$clnt->sms() 语音$clnt->voice() 流量$clnt->flow() 视频短信$clnt->vsms()
    }
}
