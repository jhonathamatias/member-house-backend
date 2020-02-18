<?php namespace Mhouse\Factories;

use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use MongoDB\Client;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

class DocumentManangerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestNamed, array $option = null)
    {
        $configODM = $container->get('applicationConfig')['mongodbODM'];
        $conn = $configODM['mongodbConnection'];

        $config = new Configuration();

        $config->setProxyDir($configODM['proxyDir']);
        $config->setProxyNamespace($configODM['proxyNamespace']);
        $config->setHydratorDir($configODM['hydratorDir']);
        $config->setHydratorNamespace($configODM['hydratorNamespace']);
        $config->setDefaultDB($configODM['defaultDB']);
        $config->setMetadataDriverImpl(AnnotationDriver::create($configODM['metadataDriverImpl']));

        AnnotationRegistry::registerLoader('class_exists');

        $client = new Client(
            "mongodb://{$conn['user']}:{$conn['password']}@{$conn['server']}:{$conn['port']}",
            [], 
            ['typeMap' => DocumentManager::CLIENT_TYPEMAP]
        );

        return DocumentManager::create($client, $config);
    }
}