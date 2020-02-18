<?php

use Zend\ConfigAggregator\ConfigAggregator;

return [
    'services' => [
        'applicationConfig' => [
            'slim' => [
                'displayErrors' => false
            ],
            'route' => [
                'cache' => false,
                'cacheLocal' => __DIR__ . '/../cache/routes-cache.php'
            ],
            'mongodbODM' => [
                'proxyDir' => '../app/Proxies',
                'proxyNamespace' => 'Mhouse\\Proxies',
                'hydratorDir' => '../app/Hydrators',
                'hydratorNamespace' => 'Mhouse\\Hydrators',
                'defaultDB' => getenv('DB_NAME'),
                'metadataDriverImpl' => __DIR__ . '/../app/Entities',
                'mongodbConnection' => [
                    'user' => getenv('DB_USERNAME'),
                    'password' => getenv('DB_PASSWORD'),
                    'server' => 'mongo',
                    'port' => getenv('DB_PORT')
                ]
            ]
        ]
    ],
    ConfigAggregator::ENABLE_CACHE => false
];
