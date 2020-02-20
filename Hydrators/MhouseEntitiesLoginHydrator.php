<?php

namespace Mhouse\Hydrators;

use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Hydrator\HydratorException;
use Doctrine\ODM\MongoDB\Hydrator\HydratorInterface;
use Doctrine\ODM\MongoDB\Query\Query;
use Doctrine\ODM\MongoDB\UnitOfWork;
use Doctrine\ODM\MongoDB\Mapping\ClassMetadata;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ODM. DO NOT EDIT THIS FILE.
 */
class MhouseEntitiesLoginHydrator implements HydratorInterface
{
    private $dm;
    private $unitOfWork;
    private $class;

    public function __construct(DocumentManager $dm, UnitOfWork $uow, ClassMetadata $class)
    {
        $this->dm = $dm;
        $this->unitOfWork = $uow;
        $this->class = $class;
    }

    public function hydrate(object $document, array $data, array $hints = array()): array
    {
        $hydratedData = array();

        /** @Field(type="id") */
        if (isset($data['_id']) || (! empty($this->class->fieldMappings['id']['nullable']) && array_key_exists('_id', $data))) {
            $value = $data['_id'];
            if ($value !== null) {
                $typeIdentifier = $this->class->fieldMappings['id']['type'];
                $return = $value instanceof \MongoDB\BSON\ObjectId ? (string) $value : $value;
            } else {
                $return = null;
            }
            $this->class->reflFields['id']->setValue($document, $return);
            $hydratedData['id'] = $return;
        }

        /** @Field(type="string") */
        if (isset($data['password']) || (! empty($this->class->fieldMappings['password']['nullable']) && array_key_exists('password', $data))) {
            $value = $data['password'];
            if ($value !== null) {
                $typeIdentifier = $this->class->fieldMappings['password']['type'];
                $return = (string) $value;
            } else {
                $return = null;
            }
            $this->class->reflFields['password']->setValue($document, $return);
            $hydratedData['password'] = $return;
        }

        /** @ReferenceOne */
        if (isset($data['user'])) {
            $reference = $data['user'];

            if ($this->class->fieldMappings['user']['storeAs'] !== ClassMetadata::REFERENCE_STORE_AS_ID && ! is_array($reference)) {
                throw HydratorException::associationTypeMismatch('Mhouse\Entities\Login', 'user', 'array', gettype($reference));
            }

            $className = $this->unitOfWork->getClassNameForAssociation($this->class->fieldMappings['user'], $reference);
            $identifier = ClassMetadata::getReferenceId($reference, $this->class->fieldMappings['user']['storeAs']);
            $targetMetadata = $this->dm->getClassMetadata($className);
            $id = $targetMetadata->getPHPIdentifierValue($identifier);
            $return = $this->dm->getReference($className, $id);
            $this->class->reflFields['user']->setValue($document, $return);
            $hydratedData['user'] = $return;
        }
        return $hydratedData;
    }
}