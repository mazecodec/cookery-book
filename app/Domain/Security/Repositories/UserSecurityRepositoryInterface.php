<?php

namespace App\Domain\Security\Repositories;

use App\Domain\Recipe\Entities\Recipe;
use App\Domain\Security\Entity\Role;
use App\Domain\Security\Entity\User;

interface UserSecurityRepositoryInterface
{
    public function addrRole(User $user, Role $role): void;

    public function create(array $data): User;

    public function iActive(User $user): bool;

    public function remove(User $user): void;

    public function removeRole(User $user, Role $role): void;

    public function update(User $user, array $data): User;
}
