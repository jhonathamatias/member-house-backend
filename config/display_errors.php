<?php

if ($appConfig['whoops']['activate'] === true) {
    $app->add(Mhouse\Middlewares\ErrorHandler\WhoopsRegister::class);
} else {
    $app->addErrorMiddleware(
        $appConfig['slim']['displayErrors'],
        true,
        true
    );
}