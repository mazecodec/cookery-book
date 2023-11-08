<?php

namespace App\Domain\Recipe\Domain\Ports\In;

use App\Domain\Recipe\Domain\Models\Recipe;

interface RetrieveRecipeUseCase
{
    public function get(int $id): ?Recipe;

    /**
     * @param int $id
     * @return Recipe[] $recipes
     */
    public function all(int $id): array;
}
