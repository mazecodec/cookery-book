<?php

namespace App\Domain\Recipe\Entities;

class Category
{
    public function __construct(
        private readonly string $name
    )
    {
    }
}
