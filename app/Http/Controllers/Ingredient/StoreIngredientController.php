<?php

namespace App\Http\Controllers\Ingredient;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIngredientRequest;
use App\Models\Ingredient;
use App\Services\Ingredients\PaginateIngredients;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

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
