<?php

namespace App\Http\Controllers\Recipe;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\RedirectResponse;

class DeleteRecipeController extends Controller
{
    /**
     * Remove the specified resource from storage.
     */
    public function __invoke(Recipe $recipe): RedirectResponse
    {
        $recipe->delete();

        return back()->with('message', 'Recipe deleted successfully!');
    }
}
