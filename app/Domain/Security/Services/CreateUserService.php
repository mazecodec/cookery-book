<?php

namespace App\Domain\Security\Services;

use App\Domain\Security\Entity\User;
use App\Domain\Security\Repositories\UserSecurityRepositoryInterface;

class CreateUserService
{

    public function __construct(
        private readonly UserSecurityRepositoryInterface $userSecurityRepository)
    {
    }

    public function __invoke(array $data): User
    {
        return $this->userSecurityRepository->create($data);
    }
}
