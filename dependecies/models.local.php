<?php

return [
    'factories' => [
        \Mhouse\Models\User::class => \Mhouse\Factories\ModelsFactories\UserFactory::class,
        \Mhouse\Models\SignIn::class => \Mhouse\Factories\ModelsFactories\SignInFactory::class
    ]
];