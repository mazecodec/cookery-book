<?php

namespace App\Domain\Recipe\Domain\Entities;

class Category
{
    public function __construct(
        private readonly string $name
    )
    {
    }
}
