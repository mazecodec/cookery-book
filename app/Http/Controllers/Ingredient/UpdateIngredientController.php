<?php

namespace App\Http\Controllers\Ingredient;

use App\Application\Models\Ingredient;
use App\Domain\Recipe\Services\Ingredients\PaginateIngredients;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateIngredientRequest;
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
