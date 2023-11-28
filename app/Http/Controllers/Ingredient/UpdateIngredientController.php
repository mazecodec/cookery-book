<?php

namespace App\Http\Controllers\Ingredient;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateIngredientRequest;
use App\Models\Ingredient;
use App\Services\Ingredients\PaginateIngredients;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UpdateIngredientController extends Controller
{
    public function __invoke(
        UpdateIngredientRequest $request,
        Ingredient $ingredient,
        PaginateIngredients $ingredients): RedirectResponse
    {
        $ingredient->update(
            $request->only([
                'name',
                'emoji',
                'description',
                'image',
            ])
        );

        return redirect()->route('ingredients.index')->with(
            'success',
            __('Ingredient :name has been updated', ['name' => $ingredient->name])
        );
    }
}
