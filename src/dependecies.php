<?php 

use DI\Container;

$container = new Container();

$container->set('User', function () {
    return new \Mhouse\Controllers\User();
});

return $container;