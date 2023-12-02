<?php

namespace App\Domain\Recipe\ValueObjects;

use App\Shared\Enums\UnitMeasurement;

class IngredientUnit
{
    private string $unit;

    public function __construct(string $unit)
    {
        $this->validate($unit);

        $this->unit = $unit;
    }

    private function validate(string $unit): void
    {
        if (empty($unit)) {
            throw new \InvalidArgumentException("Unit of measurement cannot be empty.");
        }

        if (!preg_match('/^[a-zA-Z]+$/', $unit)) {
            throw new \InvalidArgumentException("Must be a valid unit of measurement. It must only contain letters.");
        }

        if (UnitMeasurement::tryFrom($unit) === null) {
            throw new \InvalidArgumentException("Must be a valid unit of measurement. See the UnitMeasurement enum.");
        }
    }

    public function getUnit(): string
    {
        return $this->unit;
    }
}
