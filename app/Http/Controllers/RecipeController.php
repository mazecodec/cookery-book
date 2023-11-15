<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Http\Requests\StoreRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('recipes.index', [
            'recipes' => Recipe::orderBy('created_at', 'asc')->paginate(3),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRecipeRequest $request): RedirectResponse
    {
        auth()->user()->recipes()->create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
            'user_id' => auth()->user(),
        ]);

        return redirect()->route('recipes.index')->with('success', 'Recipe created successfully!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('recipes.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe): View
    {
        return view('recipes.show', [
            'recipe' => $recipe,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe): View
    {
        return view('recipes.edit', [
            'recipe' => $recipe,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRecipeRequest $request, Recipe $recipe): RedirectResponse
    {
        $recipe->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $request->image,
        ]);

        return redirect()->route('recipes.show', [
            'recipe' => $recipe,
        ])->with('success', 'Recipe updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe): RedirectResponse
    {
        $recipe->delete();

        return redirect()->route('recipes.index')->with('success', 'Recipe deleted successfully!');
    }
}
