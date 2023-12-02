<?php

namespace App\Domain\Recipe\Services\Recipe;

/**
 * @see https://abbasudo.github.io/laravel-purity/#available-filters
 */
class RecipeFilterService
{
    public function make(array $filters): array
    {
        return $this->returnFilterItem($filters);
    }

    public function returnFilterItem(array $filters): array {
        $finalFilters = [];

        foreach ($filters as $field => $filter) {
            $operations = $filter['operations'] ?? [
                '$contains' => $filter
            ];

            $finalFilters[$field] = $this->createFilterOperator($operations);
        }

        return $finalFilters;
    }

    private function createFilterOperator(array $operations): array {
        $operators = [];

        foreach ($operations as $operator => $value) {
            $operators[$operator] = $value;
        }

        return $operators;
    }
}
