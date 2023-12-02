<?php

namespace App\Domain\Recipe\Entities;

use App\Domain\Recipe\ValueObjects\IngredientUnit;

class IngredientRecipe
{
    public function __construct(
        private Ingredient $ingredient,
        private float $amount,
        private IngredientUnit $unit)
    {
    }

    /**
     * @return Ingredient
     */
    public function getIngredient(): Ingredient
    {
        return $this->ingredient;
    }

    /**
     * @param Ingredient $ingredient
     * @return IngredientRecipe
     */
    public function setIngredient(Ingredient $ingredient): IngredientRecipe
    {
        $this->ingredient = $ingredient;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return IngredientRecipe
     */
    public function setAmount(float $amount): IngredientRecipe
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return IngredientUnit
     */
    public function getUnit(): IngredientUnit
    {
        return $this->unit;
    }

    /**
     * @param IngredientUnit $unit
     * @return IngredientRecipe
     */
    public function setUnit(IngredientUnit $unit): IngredientRecipe
    {
        $this->unit = $unit;
        return $this;
    }
}
