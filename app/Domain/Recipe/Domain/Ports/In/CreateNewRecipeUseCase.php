<?php

namespace App\Domain\Recipe\Domain\Ports\In;

use App\Domain\Recipe\Domain\Models\Recipe;

interface CreateNewRecipeUseCase
{
    public function createNewRecipe(Recipe $recipe): Recipe;
}
