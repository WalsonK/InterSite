<?php

namespace App\Application\Middleware;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;

class GetCssMiddleware
{
    public function __invoke(Request $request, RequestHandler $handler): Response{

        $response = $handler->handle($request);
        $response = new Response();

        $s = $_SERVER['REQUEST_URI'];
        $e = substr($s, -4);
        //die(dirname(__FILE__) . htmlentities($s));
        if ((substr($s, 0, 8) == '/assets/') &&
            (($e == '.gif') || ($e == '.png') || ($e == '.jpg') || ($e == '.css'))
        ) {
            if (!file_exists(dirname(__FILE__) . htmlentities($s))) {
                exit('No such file.');
            } else {
                $response = readfile(dirname(__FILE__) . htmlentities($s));
                exit();
            }
        }

        return $response;

         
    }

}