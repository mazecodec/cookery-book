<?php

namespace App\Domain\Security\Domain\Repositories\User;

use App\Domain\Security\Entity\User;

interface IsActiveUserRepositoryInterface
{
    public function iActive(User $user): bool;
}
