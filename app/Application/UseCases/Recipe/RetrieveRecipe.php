<?php

namespace App\Application\UseCases\Recipe;

use App\Domain\Recipe\Domain\Ports\In\RetrieveRecipeUseCase;
use App\Domain\Recipe\Domain\Recipe;

class RetrieveRecipe implements RetrieveRecipeUseCase
{

    public function get(int $id): ?Recipe
    {

    }

    /**
     * @inheritDoc
     */
    public function all(int $id): array
    {

    }
}
