<?php

namespace App\Domain\Recipe\Entities;

use App\Application\Models\RecipeIngredient;
use App\Domain\Security\Entity\User;

class Recipe
{
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
    private string $image;
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

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Recipe
     */
    public function setTitle(string $title): Recipe
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Recipe
     */
    public function setDescription(string $description): Recipe
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return RecipeIngredient[]
     */
    public function getRecipeIngredients(): array
    {
        return $this->recipeIngredients;
    }

    /**
     * @param RecipeIngredient[] $recipeIngredients
     * @return Recipe
     */
    public function setRecipeIngredients(array $recipeIngredients): Recipe
    {
        $this->recipeIngredients = $recipeIngredients;
        return $this;
    }

    /**
     * @return Instruction[]
     */
    public function getInstructions(): array
    {
        return $this->instructions;
    }

    /**
     * @param Instruction[] $instructions
     * @return Recipe
     */
    public function setInstructions(array $instructions): Recipe
    {
        $this->instructions = $instructions;
        return $this;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     * @return Recipe
     */
    public function setImage(string $image): Recipe
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return Tag[]
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @param Tag[] $tags
     * @return Recipe
     */
    public function setTags(array $tags): Recipe
    {
        $this->tags = $tags;
        return $this;
    }

    /**
     * @return Category[]
     */
    public function getCategories(): array
    {
        return $this->categories;
    }

    /**
     * @param Category[] $categories
     * @return Recipe
     */
    public function setCategories(array $categories): Recipe
    {
        $this->categories = $categories;
        return $this;
    }

    /**
     * @return User
     */
    public function getAuthor(): User
    {
        return $this->author;
    }

    /**
     * @param User $author
     * @return Recipe
     */
    public function setAuthor(User $author): Recipe
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrepTime(): string
    {
        return $this->prepTime;
    }

    /**
     * @param string $prepTime
     * @return Recipe
     */
    public function setPrepTime(string $prepTime): Recipe
    {
        $this->prepTime = $prepTime;
        return $this;
    }

    /**
     * @return string
     */
    public function getServings(): string
    {
        return $this->servings;
    }

    /**
     * @param string $servings
     * @return Recipe
     */
    public function setServings(string $servings): Recipe
    {
        $this->servings = $servings;
        return $this;
    }


}
