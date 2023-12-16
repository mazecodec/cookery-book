<?php

namespace App\Domain\Recipe\Domain\Repositories;

use App\Domain\Recipe\Domain\AggregateRoots\Recipe;

interface RecipeRepositoryInterface
{
    public function create(array $data): Recipe;

    public function findById(int $id): ?Recipe;

    public function update(Recipe $recipe, array $data): Recipe;

    public function delete(Recipe $recipe): void;

    public function getAll(): array;

}
