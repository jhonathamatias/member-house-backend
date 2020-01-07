<?php

use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

$container = require __DIR__ . '/../src/dependecies.php';

AppFactory::setContainer($container);

$app = AppFactory::create();

require __DIR__ . '/../src/routes.php';

$app->run();