<?php

$configurations = new \Zend\ConfigAggregator\ConfigAggregator([
    new \Zend\ConfigAggregator\PhpFileProvider(__DIR__ . '/../dependecies/*.global.php'),
    new \Zend\ConfigAggregator\PhpFileProvider(__DIR__ . '/../dependecies/*.local.php'),
    new \Zend\ConfigAggregator\PhpFileProvider(__DIR__ . '/../config/*.global.php')
]);

$configData = $configurations->getMergedConfig();

return new Zend\ServiceManager\ServiceManager($configData);
