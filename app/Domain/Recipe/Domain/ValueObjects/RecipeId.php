<?php

namespace App\Domain\Recipe\Domain\ValueObjects;

use Symfony\Component\Uid\Uuid;

class RecipeId
{
    private Uuid $value;

    public function __construct()
    {
        $this->value = Uuid::v4();
    }

    public function __toString()
    {
        return $this->value->toRfc4122();
    }
}
