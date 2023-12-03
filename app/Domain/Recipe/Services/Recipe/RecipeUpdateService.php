<?php

namespace App\Domain\Recipe\Services\Recipe;

use App\Domain\Recipe\Entities\Recipe;
use App\Domain\Recipe\Repositories\RecipeRepositoryInterface;

class RecipeUpdateService
{
    public function __construct(
        private readonly RecipeRepositoryInterface $recipeRepository)
    {
    }

    public function __invoke(Recipe $recipe, array $data): Recipe
    {
        return $this->recipeRepository->update($recipe, $data);
    }
}
