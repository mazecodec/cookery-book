<?php

namespace App\Domain\Recipe\Domain\Entities;

class Tag
{
    public function __construct(
        private readonly string $name
    )
    {
    }
}
