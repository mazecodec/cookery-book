<?php

namespace App\Domain\Recipe\Presentation\Controllers\Recipe;

use App\Application\Models\Recipe;
use App\Domain\Recipe\Domain\Services\Recipe\RecipeFilterService;
use App\Domain\Recipe\Domain\Services\Recipe\RecipeSortService;
use App\Http\Controllers\Controller;
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
            'recipes' => Recipe::filter($filters)->sort($sorts)->paginate(8)->appends($request->query()),
        ]);
    }
}
