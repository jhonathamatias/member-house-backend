<?php 

use DI\Container;

$container = new Container();

$container->set('AuthMiddleware', function () {
    return new \Mhouse\Middlewares\AuthMiddleware();
});

$container->set('CorsMiddleware', function () {
    return new \Mhouse\Middlewares\CorsMiddleware();
});

$container->set('User', function () {
    return new \Mhouse\Controllers\User();
});

return $container;