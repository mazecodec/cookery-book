<?php

namespace App\Domain\Recipe\Entities;

class Tag
{
    public function __construct(
        private readonly string $name
    )
    {
    }
}
