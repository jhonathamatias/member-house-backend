<?php 

use Slim\Factory\AppFactory;

require __DIR__ . '/../../config/dotenv.php';

$container = require __DIR__ . '/../../config/container.config.php';

AppFactory::setContainer($container);

$app = AppFactory::create();

$appConfig = $container->get('applicationConfig');