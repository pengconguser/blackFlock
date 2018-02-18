<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SmsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSms()
    {
       $response=$this->json('POST','/api/captcha',[
             'phone'=>18273490350
       ]);

       $response->assertStatus(200);
    }

    public function testPhoneRestger(){
      $response=$this->json('POST','/api/user/store',[
             'phone'=>18273490350,
             'captcha'=>8722,
             'name'=>'shuaiqi',
             'password'=>'940613'
      ]);

      $response->assertStatus(200);
    }
}
