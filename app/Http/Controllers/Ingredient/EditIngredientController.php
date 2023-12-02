<?php

namespace App\Http\Controllers\Ingredient;

use App\Application\Models\Ingredient;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class EditIngredientController extends Controller
{
    public function __invoke(Ingredient $ingredient): View
    {
        return view('ingredients.edit', [
            'ingredient' => $ingredient,
        ]);
    }
}
