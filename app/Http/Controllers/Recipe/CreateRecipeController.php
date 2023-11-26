<?php

namespace App\Http\Controllers\Recipe;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRecipeRequest;
use App\Services\ImageServices;
use Illuminate\Http\RedirectResponse;

class CreateRecipeController extends Controller
{
    public function __invoke(
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

        return redirect()->route('recipes.index')->with('message', 'Recipe created successfully!');
    }
}
