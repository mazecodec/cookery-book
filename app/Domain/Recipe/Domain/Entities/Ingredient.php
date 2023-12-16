<?php

namespace App\Domain\Recipe\Domain\Entities;

class Ingredient
{
    private string $name;
    private string $image;
    private string $emoji;
    private string $description;

    public function __construct(string $name) {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Ingredient
     */
    public function setName(string $name): Ingredient
    {
        $this->name = $name;
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
     * @return Ingredient
     */
    public function setImage(string $image): Ingredient
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmoji(): string
    {
        return $this->emoji;
    }

    /**
     * @param string $emoji
     * @return Ingredient
     */
    public function setEmoji(string $emoji): Ingredient
    {
        $this->emoji = $emoji;
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
     * @return Ingredient
     */
    public function setDescription(string $description): Ingredient
    {
        $this->description = $description;
        return $this;
    }
}
