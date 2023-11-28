<?php

namespace App\Models;

use DateTime;

class IngredientRecipe
{
    private Ingredient $ingredient;
    private int $requiredQuantity;
    private string $unit;
    private DateTime $createdAt;

    public function __construct(Ingredient $ingredient)
    {
        $this->ingredient = $ingredient;
    }

    public function ingredient(Ingredient $ingredient): IngredientRecipe
    {
        $this->ingredient = $ingredient;

        return $this;
    }

    public function quantity(int $quantity): IngredientRecipe
    {
        $this->requiredQuantity = $quantity;

        return $this;
    }

    public function unit(string $unit): IngredientRecipe
    {
        $this->unit = $unit;

        return $this;
    }
}
