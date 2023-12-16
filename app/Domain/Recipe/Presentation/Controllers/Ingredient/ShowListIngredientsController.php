<?php

namespace App\Domain\Recipe\Presentation\Controllers\Ingredient;

use App\Application\Models\Ingredient;
use App\Domain\Recipe\Domain\Services\Ingredients\PaginateIngredients;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

/**
 * @see https://htmx.org/docs/
 *
 * @see https://muhammadshafeeq.com/posts/table-sorting-and-pagination-with-htmx-in-laravel/
 * @see https://github.com/hmshafeeq/larvel-htmx-crud
 *
 * @see https://noumenal.es/notes/til/htmx/progressively-enhance-a-form/
 */
class ShowListIngredientsController extends Controller
{
    public function __invoke(Request $request, PaginateIngredients $ingredients): View|string
    {
        $searchTerm = $request->input('q');

        $ingredients = Ingredient::where('name', 'LIKE', "%$searchTerm%")->when(
            $request->has('sort_field'), function ($query) use ($request) {
            $sortField = $request->input('sort_field', null);
            $sortDir = $request->input('sort_dir', 'ASC');
            $query->orderBy($sortField, $sortDir);
        }
        )->when(!$request->has('sort_field'), function ($query) {
            $query->orderBy('name', 'ASC');
        })->paginate(15, ['id', 'name', 'emoji', 'image']);

        if ($request->header('hx-request') && $request->header('hx-target') == 'ingredients-table-container') {
            return view('ingredients.partials.table', compact('ingredients'));
        }

        return view('ingredients.index', compact('ingredients'));
    }
}
