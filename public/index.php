<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

use Slim\Factory\AppFactory;
use DI\Container;

$s = $_SERVER['REQUEST_URI'];
$e = substr($s, -4);
//die(dirname(__FILE__) . htmlentities($s));
if ((substr($s, 0, 8) == '/assets/') &&
    (($e == '.gif') || ($e == '.png') || ($e == '.jpg') || ($e == '.css') || ($e == '.js'))
) {
    if (!file_exists(dirname(__FILE__).htmlentities( $s))) {
        exit('No such file.');
    } else {
        readfile(dirname(__FILE__).htmlentities( $s));
        exit();
    }
}

require __DIR__ . '/../vendor/autoload.php';

$container = new Container();

// Register Settings
$settings = require __DIR__ . '/../app/settings.php';
$settings($container);

//Register BDD
$connection = require __DIR__ . '/../app/connection.php';
$connection($container);

//$table = "{$container->get('settings')['connection']['dbname']}.users";

// Register Logger
$logger = require __DIR__ . '/../app/logger.php';
$logger($container);

// Set Container to the app
AppFactory::setContainer($container);

//Instantiate App
$app = AppFactory::create();

// Register middleware
$middleware = require __DIR__ . '/../app/middleware.php';
$middleware($app);

// Define app routes
$routes = require __DIR__ . '/../app/routes.php';
$routes($app);

$views = require __DIR__ . '/../app/views.php';
$views($app);


//app run
$app->run();