<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Slim\Views\Twig as Views;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class ProductController
{

    protected $views;

    public function __construct(Views $views)
    {
        return $this->view = $views;
        
    }

    public function display($request, $response)
    {
        return $this->view->render($response, 'products.twig');
    }

}
