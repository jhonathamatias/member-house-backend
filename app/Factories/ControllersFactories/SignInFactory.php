<?php namespace Mhouse\Factories\ControllersFactories;

use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;

use Mhouse\Controllers\SignIn;
use Mhouse\Services\JWTservice;

class SignInFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new SignIn($container->get(JWTservice::class));
    }
}