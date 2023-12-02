<?php

namespace Database\Factories;

use App\Application\Models\Ingredient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Ingredient>
 */
class IngredientFactory extends Factory
{
    protected $model = Ingredient::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'emoji' => fake()->emoji(),
            'image' => fake()->imageUrl(),
            'description' => fake()->sentence(),
        ];
    }
}
