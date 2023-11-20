<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Contracts\View\View;

class IngredientController extends Controller
{
    public function index(): View
    {
        return view('ingredients.index', [
            'ingredients' => Ingredient::all(),
        ]);
    }
}
