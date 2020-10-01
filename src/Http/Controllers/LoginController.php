<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Slim\Views\Twig as Views;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class LoginController{

    protected $views;

    public function __construct(Views $views)
    {
        return $this->view = $views;
    }
    
    public function display($request, $response)
    {
        return $this->view->render($response, 'login.twig');
    }



    public static function welcome(Request $request, Response $response){
        $response->getbody()->write('Login Controller Work !! yaaaaassss');
        return $response;
    }
    

    
}
