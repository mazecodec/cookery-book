<?php

namespace App\Http\Controllers\Ingredient;

use App\Application\Models\Ingredient;
use App\Domain\Recipe\Services\Ingredients\PaginateIngredients;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIngredientRequest;
use Illuminate\Http\RedirectResponse;

class StoreIngredientController extends Controller
{
    public function __invoke(
        StoreIngredientRequest $request,
        PaginateIngredients $ingredients): RedirectResponse
    {
        $data = $request->validated();
        $ingredient = Ingredient::create($data);

        return redirect()->route('ingredients.index')->with(
            'success',
            __('Ingredient :name has been created', ['name' => $ingredient->name])
        );
    }
}
