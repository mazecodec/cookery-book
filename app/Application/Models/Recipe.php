<?php

namespace App\Application\Models;

use Abbasudo\Purity\Traits\Filterable;
use Abbasudo\Purity\Traits\Sortable;
use App\Application\Events\RecipeCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Recipe extends Model
{
    use HasFactory, Filterable, Sortable;

    protected $fillable = [
        'title',
        'description',
        'image',
        'instructions'
    ];

    protected $filterFields = [
        'title',
        'description',
        'instructions',
    ];

    protected $sortFields = [
        'title',
        'description',
        'created_at'
    ];

    protected $dispatchesEvents = [
        'created' => RecipeCreated::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ingredients(): BelongsToMany
    {
        return $this->belongsToMany(Ingredient::class, 'ingredients_recipes');
    }
}
