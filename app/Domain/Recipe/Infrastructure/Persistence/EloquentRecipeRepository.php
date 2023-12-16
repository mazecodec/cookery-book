<?php

namespace App\Domain\Recipe\Infrastructure\Persistence;

use App\Application\Models\RecipeIngredient;
use App\Domain\Recipe\Domain\AggregateRoots\Recipe;
use App\Domain\Recipe\Domain\Repositories\RecipeRepositoryInterface;
use App\Domain\Security\Entity\User;

class EloquentRecipeRepository implements RecipeRepositoryInterface
{

    public function create(array $data): Recipe
    {
        // Ejecutar el caso de uso para crear la receta

        $user = $request->user();
        $image = $request->hasFile('image') ? $request->file('image') : $request->image;

        $recipe = $user?->recipes()->create();

        $finalIngredients = [];
        $ingredients = $request->ingredients;

        foreach ($ingredients as $ingredient) {
            $ingredientRecipe = new RecipeIngredient($ingredient);

            $finalIngredients[] = $ingredientRecipe;
        }

        $recipe->ingredients()->sync($request->ingredients);

    }

    public function findById(int $id): ?Recipe
    {
        // TODO: Implement findById() method.
    }

    public function update(Recipe $recipe, array $data): Recipe
    {
        // TODO: Implement update() method.
    }

    public function delete(Recipe $recipe): void
    {
        // TODO: Implement delete() method.
    }

    public function getAll(): array
    {
        // TODO: Implement getAll() method.
    }
}
