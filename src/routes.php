<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Interfaces\RouteCollectorProxyInterface as RouteCollectorProxy;
use Slim\Routing\RouteContext;

$app->addBodyParsingMiddleware();

$app->add('CorsMiddleware');

$app->group('/api/v1', function(RouteCollectorProxy $group) {
    require __DIR__ . '/api_v1.php';
})->add('AuthMiddleware');

$app->get('/api/v1/signin', 'SignIn:verifyLogin');

$app->addRoutingMiddleware();

