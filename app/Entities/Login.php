<?php namespace Mhouse\Entities;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/** @ODM\Document */
class Login
{
    /** @ODM\Id(strategy="auto", type="string") */
    private $id;

    /** @ODM\Field(type="string") */
    private $password;

    /** @ODM\ReferenceOne(targetDocument="Mhouse\Entities\User") */
    private $user;

    public function getId(): string
    {
        return $this->id;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
    
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getUser(): User
    {
        return $this->user;
    }
}