<?php

namespace App\Domain\Security\Repositories;

use App\Domain\Recipe\Entities\Recipe;
use App\Domain\Security\Entity\Role;
use App\Domain\Security\Entity\User;

interface RoleSecurityRepositoryInterface
{
    public function create(array $data): Role;

    public function getByName(string $roleName): ?Role;

    public function remove(Role $role): void;
}
