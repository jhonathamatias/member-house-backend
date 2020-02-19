<?php namespace Mhouse\Factories\ModelsFactories;

use Doctrine\ODM\MongoDB\DocumentManager;
use Zend\ServiceManager\Factory\FactoryInterface;
use Interop\Container\ContainerInterface;
use Mhouse\Models\Login;

class LoginFactory implements FactoryInterface 
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new Login($container->get(DocumentManager::class));
    }
}
