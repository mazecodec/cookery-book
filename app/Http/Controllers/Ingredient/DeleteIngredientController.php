<?php

namespace App\Http\Controllers\Ingredient;

use App\Application\Models\Ingredient;
use App\Domain\Recipe\Services\Ingredients\PaginateIngredients;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class DeleteIngredientController extends Controller
{
    /**
     * Remove the specified resource from storage.
     */
    public function __invoke(
        Request $request,
        Ingredient $ingredient,
        PaginateIngredients $ingredients): RedirectResponse
    {
        $ingredient->delete();

        return redirect()->route('ingredients.index')->with(
            'success',
            __('Ingredient :name has been deleted', ['name' => $ingredient->name])
        );
    }

    // New function for handling AJAX:

    /**
     * https://www.youtube.com/watch?v=ZUGejA3qRgI&t=240s
     * https://gigahosta.com/docs/r/web-development/How-to-use-Laravel-paginations--and-how-to-paginate-with-ajax-so-your-page-doesn-t-reload---
     * https://webjourney.dev/laravel-9-pagination-without-page-reload-using-ajax-webjourney
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     *
     */
    private function get_table(Request $request)
    {
        $currentPage = $request->page_num;
        // Set the paginator to the current page
        Paginator::currentPageResolver(function () use ($currentPage) {
            return $currentPage;
        });
        $transactions = DB::table('transactions')->paginate(25);
        return view("transactions_table_only", compact("transactions"));
    }
}
