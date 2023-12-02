<?php

namespace App\Domain\Recipe\Repositories;

use App\Domain\Recipe\Entities\Recipe;

interface RecipeRepositoryInterface
{
    public function create(array $data): Recipe;

    public function findById(int $id): ?Recipe;

    public function update(Recipe $recipe, array $data): Recipe;

    public function delete(Recipe $recipe): void;

    public function getAll(): array;
}
