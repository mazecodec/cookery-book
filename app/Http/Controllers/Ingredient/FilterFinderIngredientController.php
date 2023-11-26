<?php

namespace App\Http\Controllers\Ingredient;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use Illuminate\Http\Request;

class FilterFinderIngredientController extends Controller
{
    public function __invoke(Request $request)
    {
        $ingredients = [];

        if($request->has('filter')) {
            $ingredients = Ingredient::where('name', 'like', '%' . $request->filter . '%')->get();
        }

        return response()->view('ingredients.index', [
            'filter_ingredients' => $ingredients
        ])
        ->with('message', 'Ingredient filter successfully!')
        ->fragment('ingredients');
    }
}
