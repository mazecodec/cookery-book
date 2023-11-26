<?php

namespace App\Http\Controllers\Recipe;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Contracts\View\View;

class ShowRecipeController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function __invoke(Recipe $recipe): View
    {
        return view('recipes.show', [
            'recipe' => $recipe,
        ]);
    }
}
