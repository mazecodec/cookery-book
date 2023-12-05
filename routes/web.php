<?php

use App\Application\Models\Recipe;
use App\Http\Controllers\Ingredient\CreateIngredientController;
use App\Http\Controllers\Ingredient\DeleteIngredientController;
use App\Http\Controllers\Ingredient\EditIngredientController;
use App\Http\Controllers\Ingredient\FilterFinderIngredientController;
use App\Http\Controllers\Ingredient\ShowListIngredientsController;
use App\Http\Controllers\Ingredient\StoreIngredientController;
use App\Http\Controllers\Ingredient\UpdateIngredientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Recipe\CreateRecipeController;
use App\Http\Controllers\Recipe\DeleteRecipeController;
use App\Http\Controllers\Recipe\EditRecipeViewController;
use App\Http\Controllers\Recipe\ListRecipeController;
use App\Http\Controllers\Recipe\NewRecipeViewController;
use App\Http\Controllers\Recipe\RecipeController;
use App\Http\Controllers\Recipe\ShowRecipeController;
use App\Http\Controllers\Recipe\UpdateRecipeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function (Request $request) {
    $searchTerm = $request->input('q');

    if(empty($searchTerm)) {
        return view('dashboard');
    }

    $recipes = Recipe::where('title', 'LIKE', "%$searchTerm%")->when(
        $request->has('sort_field'), function ($query) use ($request) {
        $sortField = $request->input('sort_field', null);
        $sortDir = $request->input('sort_dir', 'ASC');
        $query->orderBy($sortField, $sortDir);
    })->when(!$request->has('sort_field'), function ($query) {
        $query->orderBy('title', 'ASC');
    })->paginate(15, ['id', 'title', 'description', 'image']);

    if ($request->header('hx-request') && $request->header('hx-target') == 'ingredients-table-container') {
        return view('dashboard.partials.table', compact('recipes'));
    }

    return view('dashboard', compact('recipes'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('recipes', ListRecipeController::class)->name('recipes.index');
    Route::post('recipes', CreateRecipeController::class)->name('recipes.store');
    Route::get('recipes/create', NewRecipeViewController::class)->name('recipes.create');
    Route::get('recipes/{recipe}', ShowRecipeController::class)->name('recipes.show');
    Route::put('recipes/{recipe}', UpdateRecipeController::class)->name('recipes.update');
    Route::delete('recipes/{recipe}', DeleteRecipeController::class)->name('recipes.destroy');
    Route::get('recipes/{recipe}/edit', EditRecipeViewController::class)->name('recipes.edit');

    Route::get('ingredients', ShowListIngredientsController::class)->name('ingredients.index');
    Route::get('ingredients/create', CreateIngredientController::class)->name('ingredients.create');
    Route::post('ingredients', StoreIngredientController::class)->name('ingredients.store');
    Route::get('ingredients/{ingredient}/edit', EditIngredientController::class)->name('ingredients.edit');
    Route::put('ingredients/{ingredient}', UpdateIngredientController::class)->name('ingredients.update');
    Route::delete('ingredients/{ingredient}', DeleteIngredientController::class)->name('ingredients.destroy');
    Route::get('ingredients/finder', FilterFinderIngredientController::class)->name('ingredients.finder');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
