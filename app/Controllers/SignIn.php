<?php namespace Mhouse\Controllers;

use PSR\Http\Message\ResponseInterface as Response;
use PSR\Http\Message\ServerRequestInterface as Request;

use Mhouse\Services\JWTservice;

class SignIn
{
    protected $jwt;

    public function __construct(JWTservice $jwt)
    {
        $this->jwt = $jwt;
    }

    public function verifyLogin(Request $request, Response $response)
    {
        $token = $this->jwt->generateToken('+1 hour', ['user_id' => 1]);

        $token = json_encode(['access_token' => $token->getPayload()]);

        $response->getBody()->write($token);

        return $response
            ->withHeader('Content-type', 'application/json');
    }
}