<?php

namespace App\Infrastructure\Eloquent\Recipe;

use App\Application\Models\Recipe as RecipeModel;
use App\Domain\Recipe\Domain\AggregateRoots\Recipe;
use App\Domain\Recipe\Domain\Repositories\RecipeRepositoryInterface;

class RecipeEloquentRepository implements RecipeRepositoryInterface
{
    public function create(array $data): Recipe
    {
        // Crear una nueva instancia de la entidad Recipe
        $recipe = new Recipe($data);

        // Guardar la receta en la base de datos utilizando Eloquent
        $recipeModel = RecipeModel::create([
            'title' => $recipe->getTitle(),
            'description' => $recipe->getDescription(),
        ]);

        // Asignar el ID generado por la base de datos a la entidad Recipe
        $recipe->setId($recipeModel->id);

        return $recipe;
    }

    public function findById(int $id): ?Recipe
    {
        // Buscar la receta por ID utilizando Eloquent
        $recipeModel = RecipeModel::find($id);

        // Si no se encuentra la receta, retornar null
        if (!$recipeModel) {
            return null;
        }

        // Crear una instancia de la entidad Recipe a partir del modelo Eloquent
        $recipe = new Recipe([
            'id' => $recipeModel->id,
            'name' => $recipeModel->name,
            'description' => $recipeModel->description,
            // ... otros campos de la receta
        ]);

        return $recipe;
    }

    // Puedes implementar otros métodos como update, delete, getAll, etc., según tus necesidades

    /**
     * @inheritDoc
     */
    public function update(Recipe $recipe, array $data): Recipe
    {
        // TODO: Implement update() method.
    }

    /**
     * @inheritDoc
     */
    public function delete(Recipe $recipe): void
    {
        // TODO: Implement delete() method.
    }

    /**
     * @inheritDoc
     */
    public function getAll(): array
    {
        // TODO: Implement getAll() method.
    }
}
