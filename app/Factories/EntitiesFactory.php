<?php namespace Mhouse\Factories;

use Mhouse\Factories\Exceptions\FactoryException;

class EntitiesFactory
{
    public static function get(string $entity)
    {
        $class = mb_strtolower($entity, 'UTF-8');

        $entityClass = '\\Mhouse\\Entities\\' . ucfirst($class);

        if (false === class_exists($entityClass)) {
            throw new FactoryException('Class not found: ' . $entityClass);
        }

        return new $entityClass;
    }
}