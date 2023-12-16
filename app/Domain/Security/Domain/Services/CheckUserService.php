<?php

namespace App\Domain\Security\Domain\Services;

use App\Domain\Security\Entity\User;
use App\Domain\Security\Repositories\UserSecurityRepositoryInterface;

class CheckUserService
{

    public function __construct(
        private readonly UserSecurityRepositoryInterface $userSecurityRepository)
    {
    }


    public function __invoke(User $user, string $password): bool
    {
        return $this->userSecurityRepository->checkPassword($user, $password);
    }

}
