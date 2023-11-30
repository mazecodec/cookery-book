<?php

namespace App\Http\Controllers\Ingredient;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIngredientRequest;
use App\Models\Ingredient;
use App\Services\Ingredients\PaginateIngredients;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CreateIngredientController extends Controller
{

    public function __invoke(): View
    {
        return view('ingredients.create');
    }
}
