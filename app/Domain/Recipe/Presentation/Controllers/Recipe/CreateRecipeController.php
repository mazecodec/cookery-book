<?php

namespace App\Domain\Recipe\Presentation\Controllers\Recipe;

use App\Domain\Recipe\Application\UseCases\CreateNewRecipeUseCase;
use App\Domain\Recipe\Domain\Services\ImageServices;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRecipeRequest;
use Illuminate\Http\RedirectResponse;

class CreateRecipeController extends Controller
{
    public function __construct(
        private readonly CreateNewRecipeUseCase $createRecipeUseCase)
    {
    }

    public function __invoke(
        StoreRecipeRequest $request,
        ImageServices $imageServices): RedirectResponse
    {
        $data = $request->validated();

        $data['user_id'] = auth()->user()->id;

        /**
         * [
         * 'title' => $request->title,
         * 'description' => $request->description,
         * 'instructions' => $request->instructions,
         * 'image' => $imageServices->obtainFileInputValue($image),
         * 'difficulty_level' => $request->difficulty_level ?? DifficultyLevel::EASY,
         * 'preparation_time' => $request->preparation_time ?? 60,
         * 'user_id' => auth()->user(),
         * ]
         */
        $recipe = ($this->createRecipeUseCase)($data);

        return redirect()
            ->route('recipes.index', compact('recipe'))
            ->with('message', 'Recipe created successfully!');
    }
}
