<?php

namespace App\Domain\Ingredient\Domain;

use App\Domain\Shared\BaseModel;

class Ingredient extends BaseModel
{
    private string $name;
    private string $description;
    private string $image;

    /**
     * @param int $id
     * @param string $name
     * @param string $description
     * @param string $image
     */
    public function __construct(int $id, string $name, string $description, string $image)
    {
        parent::__construct($id);
        $this->name = $name;
        $this->description = $description;
        $this->image = $image;
    }


    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): Ingredient
    {
        $this->name = $name;
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

    public function setImage(string $image): Ingredient
    {
        $this->image = $image;
        return $this;
    }

}
