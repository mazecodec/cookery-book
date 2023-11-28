<?php

namespace App\Services\Ingredients;

use App\Models\Ingredient;
use Illuminate\Http\Request;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class PaginateIngredients
{
    private AbstractPaginator $paginator;
    private Request $request;
    private Collection $data;
    private int $page;
    private int $perPage;
    private int $offset;

    public function __construct()
    {
        $this->page = 1;
        $this->perPage = 15;
        $this->offset = 0;
        $this->data = Collection::empty();

        $this->paginator = Ingredient::orderBy('name', 'ASC')->paginate(
            $this->perPage,
            ['id', 'name', 'image', 'emoji'],
            'page',
            $this->page
        );
    }

    public function list(): LengthAwarePaginator|AbstractPaginator
    {
        return $this->paginator;
    }

    public function setRequest(Request $request): self
    {
        $this->page = $request->input('page', 1);
        $this->perPage = $request->input('perPage', 15);
        $this->offset = $request->input('offset', 0);
        $this->paginator = Ingredient::orderBy('name', 'ASC')->paginate(
            $this->perPage,
            ['id', 'name', 'image', 'emoji'],
            'page',
            $this->page,
        );

        return $this;
    }
}
