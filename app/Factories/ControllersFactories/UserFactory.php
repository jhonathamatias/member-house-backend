<?php namespace Mhouse\Factories\ControllersFactories;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

use Mhouse\Controllers\User;
use Mhouse\Models\User as ModelUser;

class UserFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new User($container->get(ModelUser::class));
    }
}