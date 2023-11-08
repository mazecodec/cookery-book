<?php

namespace App\Domain\Recipe\Domain\Ports\In;

use App\Domain\Recipe\Domain\Models\Recipe;

interface UpdateRecipeUseCase
{
    public function update(int $id, Recipe $recipe): Recipe;
}
