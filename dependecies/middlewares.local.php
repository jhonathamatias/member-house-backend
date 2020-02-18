<?php

return [
    'factories' => [
        \Mhouse\Middlewares\AuthMiddleware::class => \Mhouse\Factories\MiddlewaresFactories\AuthMiddlewareFactory::class,
        \Mhouse\Middlewares\CorsMiddleware::class => \Mhouse\Factories\MiddlewaresFactories\CorsMiddlewareFactory::class
    ]
];