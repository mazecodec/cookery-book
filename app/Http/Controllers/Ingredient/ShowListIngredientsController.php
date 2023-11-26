<?php

namespace App\Http\Controllers\Ingredient;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use App\Services\Ingredients\PaginateIngredients;
use Illuminate\Contracts\View\View;

class ShowListIngredientsController extends Controller
{
    public function __invoke(PaginateIngredients $ingredients): View
    {
        return view('ingredients.index', [
            'ingredients' => $ingredients::list(),
        ]);
    }
}
