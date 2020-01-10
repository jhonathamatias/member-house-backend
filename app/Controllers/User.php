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

    public function auth(Request $request, Response $response)
    {
        $data = ['token' => uniqid('TKN'), 'user' => uniqid(('USR'))];

        $payload = json_encode($data);

        $response->getBody()->write($payload);

        return $response
            ->withHeader('Content-type', 'application/json');
    }
}