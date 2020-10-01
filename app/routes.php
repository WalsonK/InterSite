<?php

declare(strict_types=1);

use Slim\App;
use App\Http\Controllers\LoginController;
use Slim\Routing\RouteCollectorProxy;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface as RequestInterface;

return function (App $app){

    //Login Controller Routes
    //$app->get('/login', [LoginController::class, 'welcome']);
    $app->get('/login', 'LoginController:display');
    $app->post('/login', 'LoginController:connect');

    // Login Route
    /*$app->get('/login', function(RequestInterface $request, ResponseInterface $response, $args){
        return $this->get('view')->render($response, 'login.twig');
    });
    */

    // Product Route
    $app->get('/produits', 'ProductController:display');
    /*
    $app->get('/produits', function (RequestInterface $request, ResponseInterface $response, $args) {
        return $this->get('view')->render($response, 'products.twig');
    });
    */
    // Groupes Route
    $app->get('/groupes', 'GroupesController:display');

    // Stats Route
    $app->get('/stats', 'StatController:display');
    /*
    $app->get('/stats', function (RequestInterface $request, ResponseInterface $response, $args) {
        return $this->get('view')->render($response, 'stats.twig');
    });
    */
    
    $container = $app->getContainer();
    
    $app->group('', function (RouteCollectorProxy $view)
    {
        $view->get('/example/{name}', function($request, $response, $args) {
            $name = $args['name'];

            return $this->get('view')->render($response, 'example.twig', compact('name'));
        });

        $view->get('/views/{name}', function ($request, $response, $args) {
            $view = 'example.twig';
            $name = $args['name'];

            return $this->get('view')->render($response, $view, compact('name'));
        });

    });
};