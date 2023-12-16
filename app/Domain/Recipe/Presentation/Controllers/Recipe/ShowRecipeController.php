<?php

namespace App\Domain\Recipe\Presentation\Controllers\Recipe;

use App\Application\Models\Recipe;
use App\Http\Controllers\Controller;
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
