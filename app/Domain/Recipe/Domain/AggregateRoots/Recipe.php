<?php

namespace App\Domain\Recipe\Domain\AggregateRoots;

use App\Application\Models\RecipeIngredient;
use App\Domain\Recipe\Domain\Entities\Category;
use App\Domain\Recipe\Domain\Entities\Instruction;
use App\Domain\Recipe\Domain\Entities\Tag;
use App\Domain\Recipe\Domain\ValueObjects\RecipeId;
use App\Domain\Security\Entity\User;
use Ramsey\Uuid\Uuid;

class Recipe
{
    private RecipeId $id;
    private string $title;
    private string $description;
    /**
     * @var RecipeIngredient[]
     */
    private array $recipeIngredients;
    /**
     * @var Instruction[]
     */
    private array $instructions;
    private Image $image;
    /**
     * @var Tag[]
     */
    private array $tags;
    /**
     * @var Category[]
     */
    private array $categories;
    private User $author;
    private string $prepTime;
    private string $servings;

    /**
     * @param string $title
     * @param User $author
     */
    public function __construct(string $title, User $author)
    {
        $this->title = $title;
        $this->author = $author;
    }


    public function hasIngredients(): bool {
        return count($this->recipeIngredients) > 0;
    }

    public function addIngredient(RecipeIngredient $recipeIngredient): void
    {
        $this->recipeIngredients[] = $recipeIngredient;
    }



}
