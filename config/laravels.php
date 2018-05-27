<?php
/**
 * @see https://github.com/hhxsv5/laravel-s/blob/master/Settings-CN.md  Chinese
 * @see https://github.com/hhxsv5/laravel-s/blob/master/Settings.md  English
 */
return [
    'listen_ip'          => env('LARAVELS_LISTEN_IP', '127.0.0.1'),
    'listen_port'        => env('LARAVELS_LISTEN_PORT', 5200),
    'enable_gzip'        => env('LARAVELS_ENABLE_GZIP', false),
    'server'             => env('LARAVELS_SERVER', 'LaravelS'),
    'handle_static'      => env('LARAVELS_HANDLE_STATIC', false),
    'laravel_base_path'  => env('LARAVEL_BASE_PATH', base_path()),
    'inotify_reload'     => [
        'enable'     => env('LARAVELS_INOTIFY_RELOAD', false),
        'file_types' => ['.php'],
        'log'        => true,
    ],
    'websocket'          => [
        'enable' => true,
        'handler' => \App\Services\WebsocketService::class,
    ],
    'sockets'            => [
        [
            'host'     => '127.0.0.1',
            'port'     => 5291,
            'type'     => SWOOLE_SOCK_TCP,// 支持的嵌套字类型：https://wiki.swoole.com/wiki/page/16.html#entry_h2_0
            'settings' => [// Swoole可用的配置项：https://wiki.swoole.com/wiki/page/526.html
                'open_eof_check' => true,
                'package_eof'    => "\r\n",
            ],
            'handler'  => \App\Sockets\TestTcpSocket::class,
        ],
    ],
    'timer'              => [
        'enable' => false,
        'jobs'   => [
            // Enable LaravelScheduleJob to run `php artisan schedule:run` every 1 minute, replace Linux Crontab
            //\Hhxsv5\LaravelS\Illuminate\LaravelScheduleJob::class,
            //XxxCronJob::class,
        ],
    ],
    'events'             => [
    ],
    'swoole_tables'      => [
        //     'swoole_tables'  => [
        //     // 场景：WebSocket中UserId与FD绑定
        //     'ws' => [// Key为Table名称，使用时会自动添加Table后缀，避免重名。这里定义名为wsTable的Table
        //         'size'   => 102400,//Table的最大行数
        //         'column' => [// Table的列定义
        //             ['name' => 'demo', 'type' => \swoole_table::TYPE_INT, 'size' => 8],
        //         ],
        //     ],
        // //...继续定义其他Table
        // ],
    ],
    'register_providers' => [
    ],
    'swoole'             => [
        'daemonize'          => env('LARAVELS_DAEMONIZE', true),
        'dispatch_mode'      => 1,
        'reactor_num'        => function_exists('\swoole_cpu_num') ? \swoole_cpu_num() * 2 : 4,
        'worker_num'         => function_exists('\swoole_cpu_num') ? \swoole_cpu_num() * 2 : 8,
        //'task_worker_num'   => function_exists('\swoole_cpu_num') ? \swoole_cpu_num() * 2 : 8,
        'task_ipc_mode'      => 3,
        'task_max_request'   => 3000,
        'task_tmpdir'        => @is_writable('/dev/shm/') ? '/dev/shm' : '/tmp',
        'message_queue_key'  => ftok(base_path('public/index.php'), 1),
        'max_request'        => 3000,
        'open_tcp_nodelay'   => true,
        'pid_file'           => storage_path('laravels.pid'),
        'log_file'           => storage_path(sprintf('logs/swoole-%s.log', date('Y-m'))),
        'log_level'          => 4,
        'document_root'      => base_path('public'),
        'buffer_output_size' => 16 * 1024 * 1024,
        'socket_buffer_size' => 128 * 1024 * 1024,
        'reload_async'       => true,
        'max_wait_time'      => 60,
        'enable_reuse_port'  => true,

        /**
         * More settings of Swoole
         * @see https://wiki.swoole.com/wiki/page/274.html  Chinese
         * @see https://www.swoole.co.uk/docs/modules/swoole-server/configuration  English
         */
    ],
];
