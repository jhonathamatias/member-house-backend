<?php namespace Mhouse\Entities;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/** @ODM\Document */
class User
{
    /** @ODM\Id(strategy="auto", type="string") */
    private $id;

    /** @ODM\Field(type="string") @ODM\Index(unique=true) */
    private $name;

    /** @ODM\Field(type="string") @ODM\Index(unique=true)*/
    private $email;

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

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setCreatedAt(): void
    {
        $this->createdAt = date('Y-m-d H:i:s');
    }
}