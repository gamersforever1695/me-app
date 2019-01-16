<?php

namespace UserManagement\Infrastructure\Repository\Doctrine;

use Doctrine\ORM\EntityManagerInterface;
use UserManagement\Domain\Entity\User;
use UserManagement\Domain\ValueObject\UserId;
use UserManagement\Domain\ValueObject\Username;
use UserManagement\Domain\Repository\UserRepository;

class UserRepositoryImpl implements UserRepository
{
    private $entityManager;
    
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function create(User $user)
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    public function update(UserId $id, User $user)
    {

    }

    public function get(UserId $id)
    {

    }

    public function softDelete(UserId $id)
    {

    }

    public function isApproved(Username $username)
    {

    }

    public function isRegistered(Username $username)
    {
        $criteria = ['username' => $username->get()];

        $repository = $this->entityManager->getRepository(User::class);
        
        $item = $repository->findOneBy($criteria);

        return (count($item) > 0);
    }
}
