<?php

namespace App\Domain\Security\Domain\Services;

use App\Domain\Security\Entity\Role;
use App\Domain\Security\Entity\User;
use App\Domain\Security\Repositories\UserSecurityRepositoryInterface;

class AddUserRoleService
{
    public function __construct(
        private readonly UserSecurityRepositoryInterface $userSecurityRepository)
    {
    }

    public function __invoke(User $user, Role $role): void
    {
        $this->userSecurityRepository->addrRole($user, $role);
    }
}
