<?php

namespace App\Domain\Recipe\Domain\Entities;

use App\Domain\Recipe\Entities\User;

class Comment
{
    public function __construct(
        private User $author,
        private string $comment
    ) {
    }
}
