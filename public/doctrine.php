<?php
require_once 'Documents/Livro.php';

use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;
use MongoDB\Client;

if ( ! file_exists($file = '../vendor/autoload.php')) {
    throw new RuntimeException('Install dependencies to run this script.');
}

$loader = require_once $file;

// $loader->add('Documents', __DIR__);
// var_dump($loader); exit;


// AnnotationRegistry::registerLoader([$loader, 'loadClass']);

$config = new Configuration();
$config->setProxyDir(__DIR__ . '/Proxies');
$config->setProxyNamespace('Proxies');
$config->setHydratorDir(__DIR__ . '/Hydrators');
$config->setHydratorNamespace('Hydrators');
$config->setDefaultDB('doctrine_odm');
$config->setMetadataDriverImpl(AnnotationDriver::create(__DIR__ . '/Documents'));

$client = new Client('mongodb://root:123456@mongo:27017', [], ['typeMap' => DocumentManager::CLIENT_TYPEMAP]);

$dm = DocumentManager::create($client, $config);

$livro = new Livro();

$livro->setName('Livro 123 123 123');

$dm->persist($livro);

$dm->flush();

echo $livro->getId();