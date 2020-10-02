<?php

declare(strict_types=1);

use DI\Container;
use Monolog\Logger;

return function(Container $container){
    $container->set('settings', function(){
        return [
            'name' => 'Example slim App',
            'displayErrorDetails' => true,
            'logErrorDetails' => true,
            'logErrors' => true,
            'logger' => [
                'name'=> 'SlimApp',
                'path' => __DIR__ . '/../logs/app.log',
                'level' => Logger::DEBUG,
            ],
            'views' => [
                'path' => __DIR__ . '/../src/views',
                'settings' => ['cache' => false],
            ],
            'connection1' => [
                'host' => 'https://databases.000webhost.com/',
                'dbname' => 'id14985141_intermarchegestionbdd',
                'dbuser' => 'id14985141_root',
                'dbpass' => 'PJ<R{ka5^4|zhvH4',
            ],
            'connection' => [
                'host' => 'localhost',
                'dbname' => 'id14985141_intermarchegestionbdd',
                'dbuser' => 'root',
                'dbpass' => '',
            ]
        ];
    });

};