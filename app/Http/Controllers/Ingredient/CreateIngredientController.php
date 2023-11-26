<?php

namespace App\Http\Controllers\Ingredient;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIngredientRequest;
use App\Models\Ingredient;
use App\Services\Ingredients\PaginateIngredients;
use Illuminate\Http\Response;

class CreateIngredientController extends Controller
{
    public function __invoke(StoreIngredientRequest $request, PaginateIngredients $ingredients)
    {
        $data = $request->validated();
        $ingredient = Ingredient::create($data);

        return view('ingredients.index', [
            'ingredients' => $ingredients::list(),
        ])->fragment('ingredients');
    }
}
