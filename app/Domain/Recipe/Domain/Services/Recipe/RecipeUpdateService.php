<?php

namespace App\Domain\Recipe\Domain\Services\Recipe;

use App\Domain\Recipe\Domain\AggregateRoots\Recipe;
use App\Domain\Recipe\Domain\Repositories\RecipeRepositoryInterface;

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
