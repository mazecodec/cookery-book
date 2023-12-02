<?php

namespace App\Application\Models;

use DateTime;

class RecipeIngredient
{
    private Ingredient $ingredient;
    private int $requiredQuantity;
    private string $unit;
    private DateTime $createdAt;

    public function __construct(Ingredient $ingredient)
    {
        $this->ingredient = $ingredient;
    }

    public function ingredient(Ingredient $ingredient): RecipeIngredient
    {
        $this->ingredient = $ingredient;

        return $this;
    }

    public function quantity(int $quantity): RecipeIngredient
    {
        $this->requiredQuantity = $quantity;

        return $this;
    }

    public function unit(string $unit): RecipeIngredient
    {
        $this->unit = $unit;

        return $this;
    }
}
