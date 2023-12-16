<?php

namespace App\Domain\Recipe\Domain\Services\Recipe;

use App\Domain\Recipe\Domain\AggregateRoots\Recipe;
use App\Domain\Recipe\Domain\Repositories\RecipeRepositoryInterface;

class RecipeCreateService
{
    public function __construct(
        private readonly RecipeRepositoryInterface $recipeRepository)
    {
    }

    public function __invoke(array $recipe): Recipe
    {
        return $this->recipeRepository->create($recipe);
    }
}
