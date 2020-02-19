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
    
    /** @ODM\ReferenceOne(targetDocument="Mhouse\Entities\Login") */
    private $login;

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

    public function setCreatedAt(): void
    {
        $this->createdAt = date('Y-m-d H:i:s');
    }

    public function setLogin(Login $login): void
    {
        $this->login = $login;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function getLogin(): Login
    {
        return $this->login;
    }
}