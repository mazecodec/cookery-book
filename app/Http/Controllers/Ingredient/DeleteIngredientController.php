<?php

namespace App\Http\Controllers\Ingredient;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use App\Services\Ingredients\PaginateIngredients;

class DeleteIngredientController extends Controller
{
    /**
     * Remove the specified resource from storage.
     */
    public function __invoke(Ingredient $ingredient, PaginateIngredients $ingredients)
    {
//        dd($ingredient);
//        $ingredient->delete();
        $ingredients = $ingredients::list();

        return view('ingredients.index', compact(['ingredients']))->fragment('ingredients');
    }
}
