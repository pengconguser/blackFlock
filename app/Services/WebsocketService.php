<?php

namespace App\Services;
use Hhxsv5\LaravelS\Swoole\WebsocketHandlerInterface;
/**
 * @see https://wiki.swoole.com/wiki/page/400.html
 */
class WebsocketService implements WebsocketHandlerInterface
{
    // 声明没有参数的构造函数
    public function __construct()
    {
    }
    public function onOpen(\swoole_websocket_server $server, \swoole_http_request $request)
    {
        \Log::info('New Websocket connection', [$request->fd]);
        $server->push($request->fd, 'Welcome to LaravelS');
        // throw new \Exception('an exception');// 此时抛出的异常上层会忽略，并记录到Swoole日志，需要开发者try/catch捕获处理
    }
    public function onMessage(\swoole_websocket_server $server, \swoole_websocket_frame $frame)
    {
        \Log::info('Received message', [$frame->fd, $frame->data, $frame->opcode, $frame->finish]);
        $server->push($frame->fd, date('Y-m-d H:i:s'));
        // throw new \Exception('an exception');// 此时抛出的异常上层会忽略，并记录到Swoole日志，需要开发者try/catch捕获处理
    }
    public function onClose(\swoole_websocket_server $server, $fd, $reactorId)
    {
        // throw new \Exception('an exception');// 此时抛出的异常上层会忽略，并记录到Swoole日志，需要开发者try/catch捕获处理
    }
}