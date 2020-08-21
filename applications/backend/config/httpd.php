<?php

// http 服务配置
return [

    // 服务器
    'server'      => [
        // 主机
        'host' => '0.0.0.0',
        // 端口
        'port' => 9511,
    ],

    // 应用
    'application' => [
        // 配置信息
        'config' => require __DIR__ . '/main_coroutine.php',
    ],

    // 运行参数：https://wiki.swoole.com/wiki/page/274.html
    'setting'     => [
        // 开启协程
        'enable_coroutine'   => true,
        // 设置最大协程数 worker_num * num
        'max_coroutine'      => 300000,
        // 主进程事件处理线程数
        'reactor_num'        => swoole_cpu_num() / 2,
        // 工作进程数
        'worker_num'         => swoole_cpu_num(),
        // PID 文件
        'pid_file'           => '/var/run/mix-httpd-backend-hddb-api.pid',
        // 日志文件路径
        'log_file'           => '/tmp/mix-httpd-backend-hddb-api.log',
        // 子进程运行用户
        /* 'user'             => 'www', */
        // 最大数据包尺寸
        'package_max_length' => 2 * 1024 * 1024,
    ],

];
