<?php

return [
    'factories' => [
        \Mhouse\Models\User::class => \Mhouse\Factories\ModelsFactories\UserFactory::class,
        \Mhouse\Models\Login::class => \Mhouse\Factories\ModelsFactories\LoginFactory::class
    ]
];