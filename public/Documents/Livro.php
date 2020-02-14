<?php

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/** @ODM\Document */
class Livro
{
    /** @ODM\Id(strategy="auto", type="string") */
    private $id;

    /** @ODM\Field(type="string") @ODM\Index(unique=true) */
    private $name;

    /** @ODM\Field(type="date") */
    private $createdAt;

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setCreatedAt(): void
    {
        $this->createdAt = date('Y-m-d H:i:s');
    }
}