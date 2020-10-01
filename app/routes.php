<?php

declare(strict_types=1);

use Slim\App;
use App\Http\Controllers\LoginController;
use Slim\Routing\RouteCollectorProxy;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface as RequestInterface;

return function (App $app){
    // Routes pour Hello
    $app->get('/hello/{name}', function (RequestInterface $request, ResponseInterface $response, $args) {
        $name = $args['name'];
        $response->getBody()->write("Hello, $name");
        return $response;
    });

    // Define app routes
    $app->get('/user/{name}', function (RequestInterface $request, ResponseInterface $response, $args) {
        $name = $args['name'];
        $response->getBody()->write("Hello, $name");
        return $response;
    });

    //Login Controller Routes
    //$app->get('/login', [LoginController::class, 'welcome']);
    $app->get('/login', 'LoginController:display');

    // Login Route
    /*$app->get('/login', function(RequestInterface $request, ResponseInterface $response, $args){
        return $this->get('view')->render($response, 'login.twig');
    });
    */
    // Product Route
    $app->get('/produits', function (RequestInterface $request, ResponseInterface $response, $args) {
        return $this->get('view')->render($response, 'products.twig');
    });

    // Stats Route
    $app->get('/stats', function (RequestInterface $request, ResponseInterface $response, $args) {
        return $this->get('view')->render($response, 'stats.twig');
    });
    
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