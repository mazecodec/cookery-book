<?php

namespace App\Domain\Recipe\Domain;

use App\Domain\Recipe\Domain\Models\Ingredient;
use App\Domain\Shared\BaseModel;
use App\Domain\User\Domain\User;

class Recipe extends BaseModel
{
    private string $title;
    private string $description;
    private string $image;
    private int $preparationTime;
    private string $difficultyLevel;
    private string $instructions;
    private string $otherDetails;

    private User $user;

    /**
     * @param int $id
     * @param string $title
     * @param string $description
     * @param string $image
     * @param int $preparationTime
     * @param string $difficultyLevel
     * @param string $instructions
     * @param string $otherDetails
     * @param User $user
     */
    public function __construct(
        int $id,
        string $title,
        string $description,
        string $image,
        int $preparationTime,
        string $difficultyLevel,
        string $instructions,
        string $otherDetails,
        User $user)
    {
        parent::__construct($id);

        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->preparationTime = $preparationTime;
        $this->difficultyLevel = $difficultyLevel;
        $this->instructions = $instructions;
        $this->otherDetails = $otherDetails;
        $this->user = $user;
    }


    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Recipe
    {
        $this->title = $title;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): Ingredient
    {
        $this->description = $description;
        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): Recipe
    {
        $this->image = $image;
        return $this;
    }

    public function getPreparationTime(): int
    {
        return $this->preparationTime;
    }

    public function setPreparationTime(int $preparationTime): Ingredient
    {
        $this->preparationTime = $preparationTime;
        return $this;
    }

    public function getDifficultyLevel(): string
    {
        return $this->difficultyLevel;
    }

    public function setDifficultyLevel(string $difficultyLevel): Ingredient
    {
        $this->difficultyLevel = $difficultyLevel;
        return $this;
    }

    public function getInstructions(): string
    {
        return $this->instructions;
    }

    public function setInstructions(string $instructions): Recipe
    {
        $this->instructions = $instructions;
        return $this;
    }

    public function getOtherDetails(): string
    {
        return $this->otherDetails;
    }

    public function setOtherDetails(string $otherDetails): Recipe
    {
        $this->otherDetails = $otherDetails;
        return $this;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): Recipe
    {
        $this->user = $user;
        return $this;
    }


}
