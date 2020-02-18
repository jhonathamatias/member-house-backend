<?php namespace Mhouse\Factories\ServicesFactories;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use \Mhouse\Services\JWTservice;

class JWTServiceFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new JWTservice;
    }
}