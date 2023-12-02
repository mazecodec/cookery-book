<?php

namespace App\Domain\Recipe\Entities;

class Comment
{
    public function __construct(
        private User $author,
        private string $comment
    ) {
    }
}
