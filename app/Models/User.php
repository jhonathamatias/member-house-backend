<?php namespace Mhouse\Models;

use Doctrine\ODM\MongoDB\DocumentManager;
use Mhouse\Entities\Login;
use Mhouse\Factories\EntitiesFactory;

use Mhouse\Entities\User as EntitiesUser;

use Mhouse\Models\Login as LoginModel;
use Mhouse\Tools\Password;

class User
{
    protected $manager;
    protected $loginModel;

    public function __construct(DocumentManager $manager, LoginModel $loginModel)
    {
        $this->manager = $manager;
        $this->loginModel = $loginModel;
    }

    public function create(object $data)
    {
        if ($this->getUser(['email' => $data->email]) !== null){
            return false;
        }

        $user = EntitiesFactory::get('user');
        $user->setName($data->name);
        $user->setEmail($data->email);
        $user->setCreatedAt();

        $login = EntitiesFactory::get('login');
        $login->setPassword(Password::create($data->password));
        $login->setUser($user);

        $user->setLogin($login);

        $this->manager->persist($user);
        $this->manager->persist($login);
        $this->manager->flush();

        return $user->getId();
    }

    public function getAll(): array
    {
        $entityUser = $this->manager->getRepository(EntitiesUser::class);
        $documents = $entityUser->findAll();

        $users = [];
        
        foreach($documents as $document) {
            $user = new \stdClass;
            $user->id = $document->getId();
            $user->name = $document->getName();
            $user->email = $document->getEmail();
            $user->createdAt = $document->getCreatedAt();
            
            $users[] = $user;
        }

        return $users;
    }
    
    public function getUser(array $criteria)
    {
        return $this->manager
            ->getRepository(EntitiesUser::class)
            ->findOneBy($criteria);
    }
}