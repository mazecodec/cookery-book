<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRecipeRequest;
use App\Http\Requests\UpdateRecipeRequest;
use App\Models\Recipe;
use App\Services\ImageServices;
use App\Services\Recipe\RecipeFilterService;
use App\Services\Recipe\RecipeSortService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, RecipeFilterService $filter, RecipeSortService $sort): View
    {
        $filters = $filter->make($request->get('filter', []));
        $sorts = $sort->make($request->get('sort', []));

        return view('recipes.index', [
            'request' => $request->all(),
            'recipes' => Recipe::filter($filters)->sort($sorts)->paginate(100),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(
        StoreRecipeRequest $request,
        ImageServices $imageServices): RedirectResponse
    {
        $user = $request->user();
        $image = $request->hasFile('image') ? $request->file('image') : $request->image;

        $user?->recipes()->create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageServices->obtainFileInputValue($image),
            'instructions' => $request->instructions,
            'user_id' => auth()->user(),
        ]);

        return redirect()->route('recipes.index')
                         ->with('message', 'Recipe created successfully!');
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
     * @param UpdateRecipeRequest $request
     * @param Recipe $recipe
     * @param ImageServices $imageServices
     * @return RedirectResponse
     */
    public function update(
        UpdateRecipeRequest $request,
        Recipe $recipe,
        ImageServices $imageServices): RedirectResponse
    {
        $data = $request->validated();
        $image = $request->hasFile('image') ? $request->file('image') : $request->image;

        if ($data['image'] !== null) {
            $imageServices->delete($recipe->image);
            $image = $imageServices->obtainFileInputValue($image, $recipe->image);
            $data['image'] = $image;
        }

        $recipe->update($data);

        return redirect()->route('recipes.show', [
            'recipe' => $recipe,
        ])->with('message', 'Recipe updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe): RedirectResponse
    {
        $recipe->delete();

        return back()->with('message', 'Recipe deleted successfully!');
    }
}
