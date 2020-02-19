<?php namespace Mhouse\Factories\MiddlewaresFactories;

use Interop\Container\ContainerInterface;
use Whoops\Run;
use Zend\ServiceManager\Factory\FactoryInterface;

use Mhouse\Middlewares\ErrorHandler\WhoopsRegister;

class WhoopsRegisterFactory implements FactoryInterface 
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $whoopsHandler = $container->get('applicationConfig')['whoops']['handler'];

        return new WhoopsRegister(
            $container->get(Run::class),
            $container->get($whoopsHandler)
        );
    }
}