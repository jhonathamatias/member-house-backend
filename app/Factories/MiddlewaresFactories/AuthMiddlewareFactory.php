<?php namespace Mhouse\Factories\MiddlewaresFactories;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

use \Mhouse\Middlewares\AuthMiddleware;
use \Mhouse\Services\JWTservice;

class AuthMiddlewareFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new AuthMiddleware($container->get(JWTservice::class)); 
    }
}