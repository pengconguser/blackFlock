<?php

namespace App\HelperClass;

use Yunpian\Sdk\YunpianClient;

class sms
{

    public function get()
    {
//初始化client,apikey作为所有请求的默认值
    	$apikey=env('API_MSG_KEY',"");
        $clnt = YunpianClient::create($apikey);

        $param = [YunpianClient::MOBILE => '18616020000', YunpianClient::TEXT => '【云片网】您的验证码是1234'];
        $r     = $clnt->sms()->single_send($param);
//var_dump($r);
        if ($r->isSucc()) {
            //$r->data()
        }

//账户$clnt->user() 签名$clnt->sign() 模版$clnt->tpl() 短信$clnt->sms() 语音$clnt->voice() 流量$clnt->flow() 视频短信$clnt->vsms()
    }

}
