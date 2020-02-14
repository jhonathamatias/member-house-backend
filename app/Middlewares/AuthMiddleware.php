<?php

namespace Mhouse\Middlewares;

use Mhouse\Services\JWTservice;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;

class AuthMiddleware
{
    protected $jwtService;
    
    public function __construct(JWTservice $jwtService)
    {
        $this->jwtService = $jwtService;
    }

    public function __invoke(Request $request, RequestHandler $handler): Response
    {
        $response = new Response();

        if ($request->hasHeader('Authorization') === false) {
            return $response->withStatus(401, 'No token provided');
        }

        $authorization = $request->getHeader('Authorization')[0];

        if ($this->isValidAuth($authorization) === false) {
            return $response->withStatus(401, 'Token error');
        }

        [$scheme, $token] = $this->splitAuht($authorization);

        if ($this->isFormattedAuth($scheme) === false) {
            return $response->withStatus(401, 'Token malformatted');
        }

        // $this->jwtService->validate($token);

        $response = $handler->handle($request);

        return $response;
    }

    protected function isValidAuth(string $authorization): bool
    {
        $parts = $this->splitAuht($authorization);
    
        return count($parts) === 2;
    }

    protected function isFormattedAuth(string $scheme): bool {
        return (bool)preg_match('/Bearer/', $scheme);
    }

    protected function splitAuht(string $authorization) {
        return explode(' ', $authorization);
    }
}
