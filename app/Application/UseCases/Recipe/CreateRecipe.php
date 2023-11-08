<?php

namespace App\Application\UseCases\Recipe;

use App\Domain\Recipe\Domain\Models\Recipe;
use App\Domain\Recipe\Domain\Ports\In\CreateNewRecipeUseCase;

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
