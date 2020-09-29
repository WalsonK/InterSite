<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
use Slim\Factory\AppFactory;
use DI\Container;


require __DIR__ . '/../vendor/autoload.php';

$container = new Container();

// Register Settings
$settings = require __DIR__ . '/../app/settings.php';
$settings($container);

// Register Logger
$logger = require __DIR__ . '/../app/logger.php';
$logger($container);

// Set Container to the app
AppFactory::setContainer($container);

//Instantiate App
$app = AppFactory::create();

$views = require __DIR__ . '/../app/views.php';
$views($app);

// Register middleware
$middleware = require __DIR__ . '/../app/middleware.php';
$middleware($app);

// Define app routes
$routes = require __DIR__ . '/../app/routes.php';
$routes($app);


//app run
$app->run();