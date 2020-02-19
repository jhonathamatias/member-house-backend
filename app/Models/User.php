<?php namespace Mhouse\Models;

use Doctrine\ODM\MongoDB\DocumentManager;
use Mhouse\Entities\Login;
use Mhouse\Factories\EntitiesFactory;

use Mhouse\Entities\User as EntitiesUser;

use Mhouse\Models\Login as LoginModel;

class User
{
    protected $manager;
    protected $loginModel;

    public function __construct(DocumentManager $manager, LoginModel $loginModel)
    {
        $this->manager = $manager;
        $this->loginModel = $loginModel;
    }

    public function create(object $data): string
    {
        $user = EntitiesFactory::get('user');
        $user->setName($data->name);
        $user->setEmail($data->email);
        $user->setCreatedAt();

        $login = EntitiesFactory::get('login');
        $login->setPassword($data->password);
        $login->setUser($user);

        $user->setLogin($login);

        $this->manager->persist($user);
        $this->manager->persist($login);
        $this->manager->flush();

        return $user->getId();
    }

    public function getAll()
    {
        $entityUser = $this->manager->getRepository(EntitiesUser::class);
        $documents = $entityUser->findAll();

        $users = [];
        $user = new \stdClass;

        foreach($documents as $document) {
            $user->id = $document->getId();
            $user->name = $document->getName();
            $user->email = $document->getEmail();
            $user->password = $document->getLogin()->getPassword();

            $users[] = $user;
        }

        return $users;
    }
    
}