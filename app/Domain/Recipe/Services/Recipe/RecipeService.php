<?php

namespace App\Domain\Recipe\Services\Recipe;

use App\Domain\Recipe\Entities\Recipe;
use App\Domain\Recipe\Repositories\RecipeRepositoryInterface;

class RecipeService
{
    public function __construct(private readonly RecipeRepositoryInterface $recipeRepository)
    {
    }

    public function createRecipe(array $data): Recipe
    {
        $recipe = $this->recipeRepository->create($data);

        // Puedes realizar otras acciones después de crear la receta si es necesario

        return $recipe;
    }

    public function updateRecipe(Recipe $recipe, array $data): Recipe
    {
        // Puedes realizar validaciones adicionales aquí antes de actualizar la receta

        // Lógica de negocio para la actualización de la receta
        $updatedRecipe = $this->recipeRepository->update($recipe, $data);

        // Puedes realizar otras acciones después de actualizar la receta si es necesario

        return $updatedRecipe;
    }

    public function deleteRecipe(Recipe $recipe): void
    {
        // Puedes realizar validaciones adicionales aquí antes de eliminar la receta

        // Lógica de negocio para la eliminación de la receta
        $this->recipeRepository->delete($recipe);

        // Puedes realizar otras acciones después de eliminar la receta si es necesario
    }

    public function getRecipeById(int $id): ?Recipe
    {
        // Puedes realizar validaciones adicionales aquí antes de buscar la receta

        // Lógica de negocio para obtener la receta por ID
        $recipe = $this->recipeRepository->findById($id);

        // Puedes realizar otras acciones después de obtener la receta si es necesario

        return $recipe;
    }

    // Puedes agregar más métodos según las operaciones específicas de tu aplicación

}
