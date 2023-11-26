<?php

namespace App\Http\Controllers\Recipe;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use App\Services\Recipe\RecipeFilterService;
use App\Services\Recipe\RecipeSortService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ListRecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(
        Request $request,
        RecipeFilterService $filter,
        RecipeSortService $sort): View
    {
        $filters = $filter->make($request->get('filter', []));
        $sorts = $sort->make($request->get('sort', []));

        return view('recipes.index', [
            'request' => $request->all(),
            'recipes' => Recipe::filter($filters)->sort($sorts)->paginate(100),
        ]);
    }
}
