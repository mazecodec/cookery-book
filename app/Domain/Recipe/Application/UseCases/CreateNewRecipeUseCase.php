<?php

namespace App\Domain\Recipe\Application\UseCases;

use App\Domain\Recipe\Domain\AggregateRoots\Recipe;
use App\Domain\Recipe\Domain\Services\Recipe\RecipeCreateService;

class CreateNewRecipeUseCase
{
    public function __construct(
        private readonly RecipeCreateService $recipeCreateService)
    {
    }

    /**
     * @param array $recipe
     * @details RecipeCreateService
     * @return Recipe
     */
    public function __invoke(array $recipe): Recipe
    {
        return ($this->recipeCreateService)($recipe);
    }
}
