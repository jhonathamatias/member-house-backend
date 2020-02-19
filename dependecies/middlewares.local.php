<?php

return [
    'factories' => [
        \Mhouse\Middlewares\AuthMiddleware::class => \Mhouse\Factories\MiddlewaresFactories\AuthMiddlewareFactory::class,
        \Mhouse\Middlewares\CorsMiddleware::class => \Mhouse\Factories\MiddlewaresFactories\CorsMiddlewareFactory::class,
        \Mhouse\Middlewares\ErrorHandler\WhoopsRegister:: class => \Mhouse\Factories\MiddlewaresFactories\WhoopsRegisterFactory::class
    ]
];