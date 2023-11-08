<?php

namespace App\Application\Services;

use App\Domain\Recipe\Domain\Models\Recipe;
use App\Domain\Recipe\Domain\Ports\In\CreateNewRecipeUseCase;
use App\Domain\Recipe\Domain\Ports\In\RetrieveRecipeUseCase;
use App\Domain\Recipe\Domain\Ports\In\UpdateRecipeUseCase;

class RecipeService implements RecipeServiceInterface
{
    public function __construct(
        private readonly RetrieveRecipeUseCase $retrieveRecipe,
        private readonly CreateNewRecipeUseCase $createService,
        private readonly UpdateRecipeUseCase $updateService,
        private readonly DeleteRecipeUseCase $deleteService)
    {
    }

    public function createNewRecipe(
        string $title,
        string $description,
        string $image,
        array $products = []): Recipe
    {
        return $this->createService->createNewRecipe(Recipe::create(
            title: $title,
            description: $description,
            image: $image,
            products: $products
        ));
    }

    public function delete(int $id): void
    {
        $this->deleteService->delete($id);
    }

    public function get(int $id): ?Recipe
    {
        return $this->retrieveRecipe->get($id);
    }

    /**
     * @inheritDoc
     */
    public function all(int $id): array
    {
        return $this->retrieveRecipe->all($id);
    }

    public function update(
        int $id,
        string $title,
        string $description,
        string $image,
        array $products = [],
        ): Recipe
    {
        return $this->updateService->update(
            id: $id,
            title: $title,
            description: $description,
            image: $image,
            products: $products,
        );
    }
}
