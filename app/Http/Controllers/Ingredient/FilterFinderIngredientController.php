<?php

namespace App\Http\Controllers\Ingredient;

use App\Application\Models\Ingredient;
use App\Domain\Recipe\Services\Ingredients\PaginateIngredients;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class FilterFinderIngredientController extends Controller
{
    public function __invoke(Request $request, PaginateIngredients $ingredients): string
    {
        $filterIngredients = Collection::empty();

        if ($request->has('name')) {
            $name = trim(strtolower($request->name));
            $filterIngredients = Ingredient::whereRaw('LOWER(name) LIKE ?', ['%' . $name . '%'])->limit(10)->get();
        }

        if ($request->header('hx-request')
            && $request->header('hx-target') == 'table-container') {
            return view('ingredients.partials.table-body', compact('ingredients'));
        }

        return view('ingredients.index', [
            'ingredients' => $ingredients->setRequest($request)->list(),
            'filterIngredients' => $filterIngredients
        ])->fragment('filter_ingredients');
    }
}
