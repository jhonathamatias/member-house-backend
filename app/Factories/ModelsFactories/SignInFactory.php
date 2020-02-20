<?php namespace Mhouse\Factories\ModelsFactories;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

use Mhouse\Models\SignIn;
use Mhouse\Models\User;

class SignInFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new SignIn($container->get(User::class));
    }
}