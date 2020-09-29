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
                'path' => __DIR__ . '/../src/Views',
                'settings' => ['cache' => false],
            ],
        ];
    });

};