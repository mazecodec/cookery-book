<?php

namespace App\Http\Controllers\Recipe;

use App\Application\Models\Recipe;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class EditRecipeViewController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function __invoke(Recipe $recipe): View
    {
        return view('recipes.edit', [
            'recipe' => $recipe,
        ]);
    }
}
