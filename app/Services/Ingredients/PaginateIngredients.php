<?php

namespace App\Services\Ingredients;

use App\Models\Ingredient;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PaginateIngredients
{
    public static function list(): LengthAwarePaginator
    {
        return Ingredient::orderBy('name')->paginate(15)->fragment('ingredients');
    }
}
