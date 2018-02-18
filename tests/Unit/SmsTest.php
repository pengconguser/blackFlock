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
}
