<?php

namespace App\Domain\Security\Domain\Repositories\User;

use App\Domain\Security\Entity\User;

interface UserSecurityRepositoryInterface
{
    public function create(array $data): User;

    public function remove(User $user): void;

    public function update(User $user, array $data): User;
}
