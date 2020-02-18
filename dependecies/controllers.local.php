<?php 

return [
    'factories' => [
        \Mhouse\Controllers\User::class => \Mhouse\Factories\ControllersFactories\UserFactory::class,
        \Mhouse\Controllers\SignIn::class => \Mhouse\Factories\ControllersFactories\SignInFactory::class
    ]
];