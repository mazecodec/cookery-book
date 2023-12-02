<?php

namespace App\Http\Controllers\Recipe;

use App\Application\Models\RecipeIngredient;
use App\Application\UseCases\CreateRecipeUseCase;
use App\Domain\Recipe\Services\ImageServices;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRecipeRequest;
use App\Shared\Enums\DifficultyLevel;
use Illuminate\Http\RedirectResponse;

class CreateRecipeController extends Controller
{
    public function __construct(private readonly CreateRecipeUseCase $createRecipeUseCase)
    {
    }

    public function __invoke(
        StoreRecipeRequest $request,
        ImageServices $imageServices): RedirectResponse
    {
        $data = $request->validated();

        // Ejecutar el caso de uso para crear la receta
        $recipe = $this->createRecipeUseCase->execute($data);

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

        $finalIngredients = [];
        $ingredients = $request->ingredients;
        foreach ($ingredients as $ingredient) {
            $ingredientRecipe = new RecipeIngredient($ingredient);

            $finalIngredients[] = $ingredientRecipe;
        }
//            ->forEach(function ($ingredient) {

//
//            $ingredient->recipes()->attach($this->id);
//        });

        $recipe->ingredients()->sync($request->ingredients);

        return redirect()->route('recipes.index')->with('message', 'Recipe created successfully!');
    }
}
