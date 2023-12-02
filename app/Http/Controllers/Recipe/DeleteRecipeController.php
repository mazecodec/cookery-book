<?php

namespace App\Http\Controllers\Recipe;

use App\Application\Models\Recipe;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class DeleteRecipeController extends Controller
{
    /**
     * Remove the specified resource from storage.
     */
    public function __invoke(Recipe $recipe): RedirectResponse
    {
        $recipe->ingredients()->detach();
        $recipe->delete();

        return back()->with('message', 'Recipe deleted successfully!');
    }
}
