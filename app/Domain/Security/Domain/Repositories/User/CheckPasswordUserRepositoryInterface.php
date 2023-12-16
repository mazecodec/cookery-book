<?php

namespace App\Domain\Security\Domain\Repositories\User;

use App\Domain\Security\Entity\User;

interface CheckPasswordUserRepositoryInterface
{
    public function checkPassword(User $user, string $password);
}
