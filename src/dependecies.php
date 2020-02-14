<?php 

use DI\Container;

$container = new Container();

$container->set('AuthMiddleware', function ($c) {
    return new \Mhouse\Middlewares\AuthMiddleware($c->get('JWT.service'));
});

$container->set('CorsMiddleware', function () {
    return new \Mhouse\Middlewares\CorsMiddleware();
});

$container->set('User', function () {
    return new \Mhouse\Controllers\User();
});

$container->set('JWT.service', function () {
    return new \Mhouse\Services\JWTservice();
});

$container->set('SignIn', function ($c) {
    return new \Mhouse\Controllers\SignIn($c->get('JWT.service'));
});

return $container;