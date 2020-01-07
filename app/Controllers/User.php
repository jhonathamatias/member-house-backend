<?php namespace Mhouse\Controllers;

use PSR\Http\Message\ResponseInterface as Response;
use PSR\Http\Message\ServerRequestInterface as Request;

class User
{
    public function create(Request $request, Response $response)
    {
        $response->getBody()->write('Criar usúario');

        return $response;
    }
}