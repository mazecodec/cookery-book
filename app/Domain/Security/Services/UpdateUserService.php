<?php

namespace App\Domain\Security\Services;

use App\Domain\Security\Entity\User;
use App\Domain\Security\Repositories\UserSecurityRepositoryInterface;

class UpdateUserService
{
    public function __construct(
        private readonly UserSecurityRepositoryInterface $userSecurityRepository)
    {
    }

    public function __invoke(User $user, array $data): User
    {
        return $this->userSecurityRepository->update($user, $data);
    }
}
