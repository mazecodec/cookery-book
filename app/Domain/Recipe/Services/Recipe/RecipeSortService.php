<?php

namespace App\Domain\Recipe\Services\Recipe;

use Illuminate\Support\Arr;

/**
 * @see https://abbasudo.github.io/laravel-purity/#apply-sort
 */
class RecipeSortService
{

    public function make(array $request): array
    {
        $sorts = [];

        foreach ($request as $field => $sortAs) {
            $sorts[] = "$field:$sortAs";
        }

        return Arr::flatten($sorts);
    }
}
