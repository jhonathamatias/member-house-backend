<?php

use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

require __DIR__ . '/../config/dotenv.php';

$container = require __DIR__ . '/../config/container.config.php';

AppFactory::setContainer($container);

$app = AppFactory::create();

$appConfig = $container->get('applicationConfig');

require __DIR__ . '/../config/display_errors.php';

require __DIR__ . '/../config/cache.config.php';

require __DIR__ . '/../config/routes.php';

$app->run();