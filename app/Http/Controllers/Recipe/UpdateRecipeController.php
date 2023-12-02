<?php

namespace App\Http\Controllers\Recipe;

use App\Application\Models\Recipe;
use App\Domain\Recipe\Services\ImageServices;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateRecipeRequest;
use Illuminate\Http\RedirectResponse;

class UpdateRecipeController extends Controller
{
    /**
     * @param UpdateRecipeRequest $request
     * @param Recipe $recipe
     * @param ImageServices $imageServices
     * @return RedirectResponse
     */
    public function __invoke(
        UpdateRecipeRequest $request,
        Recipe $recipe,
        ImageServices $imageServices): RedirectResponse
    {
        $data = $request->validated();
        $image = $request->hasFile('image') ? $request->file('image') : $request->image;

        if ($data['image'] !== null) {
            $imageServices->delete($recipe->image);
            $image = $imageServices->obtainFileInputValue($image, $recipe->image);
            $data['image'] = $image;
        }

        $recipe->update($data);

        return redirect()->route('recipes.show', [
            'recipe' => $recipe,
        ])->with('message', 'Recipe updated successfully!');
    }
}
