<?php

namespace Database\Factories;

use App\Models\Ingredient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Ingredient>
 */
class IngredientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'image' => fake()->imageUrl(),
            'description' => fake()->sentence(),
            'quantity' => fake()->randomNumber(),
            'unit' => fake()->word(),
            'notes' => fake()->sentence(),
            'is_deleted' => fake()->boolean(),
            'is_visible' => fake()->boolean(),
            'is_favorite' => fake()->boolean(),
            'is_pinned' => fake()->boolean(),
            'is_public' => fake()->boolean(),
            'created_at' => now(),
            'updated_at' => now(),
            'deleted_at' => null,
            'user_id' => User::inRandomOrder()->first(),
            'recipe_id' => Recipe::inRandomOrder()->first(),
        ];
    }
}
