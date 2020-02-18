<?php

use Slim\Interfaces\RouteCollectorProxyInterface as RouteCollectorProxy;

$app->addBodyParsingMiddleware();

$app->add('Mhouse\Middlewares\CorsMiddleware');

$app->group('/api/v1', function(RouteCollectorProxy $group) {
    require __DIR__ . '/../src/api_v1.php';
})->add('Mhouse\Middlewares\AuthMiddleware');

$app->addRoutingMiddleware();
