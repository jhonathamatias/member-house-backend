<?php

use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

require __DIR__ . '/../config/dotenv.php';

$container = require __DIR__ . '/../config/config.container.php';

// $container = require __DIR__ . '/../src/dependecies.php';

AppFactory::setContainer($container);

$app = AppFactory::create();

require __DIR__ . '/../config/routes.php';

$app->run();