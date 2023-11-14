<?php

namespace App\Domain\Recipe\Domain\Ports\In;

use App\Domain\Recipe\Domain\Recipe;

interface CreateNewRecipeUseCase
{
    public function createNewRecipe(Recipe $recipe): Recipe;
}
