<?php

namespace Database\Factories;

use App\Application\Models\Recipe;
use App\Application\Models\User;
use App\Shared\Enums\DifficultyLevel;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Recipe>
 */
class RecipeFactory extends Factory
{
    protected $model = Recipe::class;

    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'image' => fake()->randomElement([
                fake()->imageUrl(),
                fake()->image('public/storage/images', 400, 300, null, false),
            ]),
            'instructions' => fake()->paragraph(),
            'difficulty_level' => fake()->randomElement(
                [DifficultyLevel::EASY, DifficultyLevel::MEDIUM, DifficultyLevel::HARD]
            ),
            'preparation_time' => fake()->randomElement([fake()->numberBetween(1, 200)]),
            'other_details' => fake()->randomElement([fake()->paragraph()]),
            'user_id' => User::inRandomOrder()->first(),
        ];
    }
}
