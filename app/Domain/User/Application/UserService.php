<?php

namespace App\Domain\User\Application;

use App\Domain\User\Domain\User;
use App\Domain\User\Domain\UserRepositoryInterface;

class UserService
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function createUser(string $name, string $email): User
    {
        $user = new User($name, $email);
        $this->userRepository->save($user);
        return $user;
    }

    public function getUserById(string $id): ?User
    {
        return $this->userRepository->findById($id);
    }

    public function getUserByEmail(string $email): ?User
    {
        return $this->userRepository->findByEmail($email);
    }
}
