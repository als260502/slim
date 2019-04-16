<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
            'view' => __DIR__ . '/../resources/views',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],
        'determineRouteBeforeAppMiddleware' =>false,
        'displayErrorDetails' => true, // set to false in production
        'db' =>[
            'driver'    => 'mysql',
            //'host'      => 'npinfo.dlinkddns.com',
            'host'      => 'localhost',
            'database'  => 'db_teste',
            'username'  => 'root',
            'password'  => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ],        
        
    ],
];
