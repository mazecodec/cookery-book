<?php

namespace App\Domain\Recipe\Services\Recipe;

use App\Domain\Recipe\Entities\Recipe;
use App\Domain\Recipe\Repositories\RecipeRepositoryInterface;

class RecipeCreateService
{
    public function __construct(
        private readonly RecipeRepositoryInterface $recipeRepository)
    {
    }

    public function __invoke(array $data): Recipe
    {
        return $this->recipeRepository->create($data);
    }
}
