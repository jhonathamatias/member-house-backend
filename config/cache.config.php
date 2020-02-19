<?php

if ($appConfig['route']['cache'] === true) {
    $routeCollector = $app->getRouteCollector();
    $routeCollector->setCacheFile($appConfig['route']['cacheLocal']);
}