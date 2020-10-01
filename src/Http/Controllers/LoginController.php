<?php

declare(strict_types=1);

namespace App\Http\Controllers;


use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface as RequestInterface;

class LoginController{
    
    public  static function welcome(RequestInterface $request, ResponseInterface $response){
        $response->getbody()->write('Login Controller Work !! yaaaaassss');
        //return $this->get('view')->render($response, 'login.twig'); TEST
        return $response;
    }

    
}
