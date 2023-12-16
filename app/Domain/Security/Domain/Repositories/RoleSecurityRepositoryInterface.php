<?php

namespace App\Domain\Security\Domain\Repositories;

use App\Domain\Security\Entity\Role;

interface RoleSecurityRepositoryInterface
{
    public function create(array $data): Role;

    public function getByName(string $roleName): ?Role;

    public function remove(Role $role): void;
}
