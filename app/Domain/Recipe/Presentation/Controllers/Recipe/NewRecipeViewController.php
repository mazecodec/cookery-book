<?php

namespace App\Domain\Recipe\Presentation\Controllers\Recipe;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class NewRecipeViewController extends Controller
{
    public function __invoke(): View
    {
        return view('recipes.create');
    }
}
