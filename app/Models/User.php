<?php namespace Mhouse\Models;

use Doctrine\ODM\MongoDB\DocumentManager;
use Mhouse\Factories\EntitiesFactory;

use Mhouse\Entities\User as EntitiesUser;

class User
{
    protected $manager;

    public function __construct(DocumentManager $manager)
    {
        $this->manager = $manager;
    }

    public function create(object $data): string
    {
        $user = EntitiesFactory::get('user');
        $user->setName($data->name);
        $user->setEmail($data->email);
        $user->setCreatedAt();

        $this->manager->persist($user);

        $this->manager->flush();

        return $user->getId();
    }

    public function getAll(): array
    {
        $entityUser = $this->manager->getRepository(EntitiesUser::class);

        return $entityUser->findAll();
    }
}