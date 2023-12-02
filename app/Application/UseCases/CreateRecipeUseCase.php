<?php

namespace App\Application\UseCases;

use App\Application\Models\Recipe;
use App\Domain\Recipe\Services\Recipe\RecipeService;

class CreateRecipeUseCase
{
    protected $recipeService;

    public function __construct(RecipeService $recipeService)
    {
        $this->recipeService = $recipeService;
    }

    public function execute(array $data): Recipe
    {
        // Puedes realizar validaciones adicionales aquí antes de crear la receta

        // Lógica de negocio para la creación de la receta
        $recipe = $this->recipeService->createRecipe($data);

        // Puedes realizar otras acciones después de crear la receta si es necesario

        return $recipe;
    }
}
