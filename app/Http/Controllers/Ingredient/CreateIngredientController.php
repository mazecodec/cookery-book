<?php

namespace App\Http\Controllers\Ingredient;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CreateIngredientController extends Controller
{

    public function __invoke(): View
    {
        return view('ingredients.create');
    }
}
