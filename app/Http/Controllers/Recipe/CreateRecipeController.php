<?php

namespace App\Http\Controllers\Recipe;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRecipeRequest;
use App\Models\IngredientRecipe;
use App\Services\ImageServices;
use Illuminate\Http\RedirectResponse;

class CreateRecipeController extends Controller
{
    public function __invoke(
        StoreRecipeRequest $request,
        ImageServices $imageServices): RedirectResponse
    {
        $user = $request->user();
        $image = $request->hasFile('image') ? $request->file('image') : $request->image;

        $recipe = $user?->recipes()->create([
            'title' => $request->title,
            'description' => $request->description,
            'instructions' => $request->instructions,
            'image' => $imageServices->obtainFileInputValue($image),
            'difficulty_level' => $request->difficulty_level ?? DifficultyLevel::EASY,
            'preparation_time' => $request->preparation_time ?? 60,
            'user_id' => auth()->user(),
        ]);

        $ingredients = $request->ingredients->forEach(function ($ingredient) {
            return new IngredientRecipe($ingredient);

            $ingredient->recipes()->attach($this->id);
        });

        $recipe->ingredients()->sync($request->ingredients);

        return redirect()->route('recipes.index')->with('message', 'Recipe created successfully!');
    }
}
