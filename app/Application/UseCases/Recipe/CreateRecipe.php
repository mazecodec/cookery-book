<?php

namespace App\Application\UseCases\Recipe;

use App\Domain\Recipe\Domain\Ports\In\CreateNewRecipeUseCase;
use App\Domain\Recipe\Domain\Recipe;

class CreateRecipe implements CreateNewRecipeUseCase
{
    public function __construct(
        protected RecipeRepositoryPort $repositoryPort
    )
    {
    }

    /**
     * @inheritDoc
     */
    public function createNewRecipe(Recipe $recipe): Recipe
    {
        $this->repositoryPort->create($recipe);

    }
}
