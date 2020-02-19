<?php

return [
    'invokables' => [
        Whoops\Run::class => Whoops\Run::class,
        Whoops\Handler\PrettyPageHandler::class => Whoops\Handler\PrettyPageHandler::class,
        Whoops\Handler\JsonResponseHandler::class => Whoops\Handler\JsonResponseHandler::class 
    ],
    'factories' => [
        Doctrine\ODM\MongoDB\DocumentManager::class => Mhouse\Factories\DocumentManangerFactory::class
    ]
];