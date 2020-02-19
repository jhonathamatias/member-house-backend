<?php namespace Mhouse\Models;

use Doctrine\ODM\MongoDB\DocumentManager;

use Mhouse\Factories\EntitiesFactory;

use Mhouse\Entities\Login as EntitiesLogin;

class Login
{
    protected $manager;

    public function __construct(DocumentManager $manager)
    {
        $this->manager = $manager;
    }

    public function create(object $data): EntitiesLogin
    {
        $login = EntitiesFactory::get('login');
        $login->setPassword($data->password);
        $login->setUser($data->user);

        $this->manager->persist($login);

        $this->manager->flush();

        return $login;
    }
}