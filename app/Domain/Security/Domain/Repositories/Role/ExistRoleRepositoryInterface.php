<?php

namespace App\Domain\Security\Domain\Repositories\Role;

use App\Domain\Security\Entity\Role;

interface ExistRoleRepositoryInterface
{
    public function create(array $data): Role;

    public function getByName(string $roleName): ?Role;

    public function remove(Role $role): void;
}
