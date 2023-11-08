<?php

namespace App\Domain\Recipe\Domain\Models;

use DateTime;

class Recipe
{
    private int $id;
    private string $title;
    private string $description;
    private string $image;
    /**
     * @var Product[] $products
     */
    private array $products;
    private DateTime $created_at;
    private ?DateTime $updated_at;

    /**
     * @param int $id
     * @param string $title
     * @param string $description
     * @param string $image
     */
    public function __construct(int $id, string $title, string $description, string $image)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->created_at = new DateTime('Y-m-d H:i:s');
    }

    public static function create(
        string $title,
        string $description,
        string $image,
        array $products = []): self
    {
        $recipe = new self(
            id: uuid_create(UUID_VARIANT_NCS),
            title: $title,
            description: $description,
            image: $image
        );

        if (!empty($products)) {
            $recipe->setProducts($products);
        }

        return $recipe;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): Recipe
    {
        $this->id = $id;
        return $this;
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

    public function setDescription(string $description): Recipe
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

    public function getProducts(): array
    {
        return $this->products;
    }

    public function setProducts(array $products): Recipe
    {
        $this->products = $products;
        return $this;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->created_at;
    }

    public function setCreatedAt(DateTime $created_at): Recipe
    {
        $this->created_at = $created_at;
        return $this;
    }

    public function getUpdatedAt(): ?DateTime
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?DateTime $updated_at): Recipe
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    public function addProduct(Product $product): Recipe
    {
        if (!in_array($product, $this->products)) {
            $this->products[] = $product;
        }
        return $this;
    }
}
