<?php

declare(strict_types=1);

use App\Application\Middleware\ExampleAfterMiddleware;
use App\Application\Middleware\ExampleBeforeMiddleware;
use Slim\App;

return function (App $app) {

    //Debuging middleware
    $settings = $app->getContainer()->get('settings');
    $app->addErrorMiddleware(
        $settings['displayErrorDetails'], 
        $settings['logErrors'], 
        $settings['logErrorDetails'],
    );
    $app->add(ExampleBeforeMiddleware::class);
    $app->add(ExampleAfterMiddleware::class);
};
