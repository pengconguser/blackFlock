<?php

use Illuminate\Http\Request;
use SwooleTW\Http\Websocket\Facades\Websocket;

/*
|--------------------------------------------------------------------------
| Websocket Routes
|--------------------------------------------------------------------------
|
| Here is where you can register websocket events for your application.
|
*/

Websocket::on('connect', function ($websocket, Request $request) {
    // called while socket on connect
    $websocket->emit('websocket start');
});

Websocket::on('disconnect', function ($websocket) {
    // called while socket on disconnect
    $websocket->emit('websocket close');
});

Websocket::on('example', function ($websocket, $data) {
    $websocket->emit('message', $data);
});

Websocket::on('massageSend','swooleMassageController@main');

// Websocket::on('test', 'ExampleController@method');