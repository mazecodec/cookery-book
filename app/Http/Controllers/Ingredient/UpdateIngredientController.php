<?php

namespace App\Http\Controllers\Ingredient;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use Illuminate\Contracts\View\View;

class UpdateIngredientController extends Controller
{
    public function __invoke(UpdateIngredientRequest $request): View
    {
        return view('ingredients.index', [
            'ingredients' => Ingredient::all(),
        ]);
    }
}
