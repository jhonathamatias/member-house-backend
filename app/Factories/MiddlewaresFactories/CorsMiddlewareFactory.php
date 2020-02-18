<?php namespace Mhouse\Factories\MiddlewaresFactories;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

use Mhouse\Middlewares\CorsMiddleware;

class CorsMiddlewareFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new CorsMiddleware;
    }
}