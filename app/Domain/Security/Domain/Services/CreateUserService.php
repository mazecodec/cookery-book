<?php

namespace App\Domain\Security\Domain\Services;

use App\Domain\Security\Domain\Repositories\User\UserSecurityRepositoryInterface;
use App\Domain\Security\Entity\User;

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
