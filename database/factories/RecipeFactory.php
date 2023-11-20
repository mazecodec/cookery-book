<?php

namespace Database\Factories;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'image' =>
                fake()->randomElement([
                fake()->imageUrl(),
                fake()->image('public/storage/images',400,300, null, false),
            ]),
            'instructions' => fake()->paragraph(),
            'difficulty_level' => fake()->randomElement(['easy', 'medium', 'hard']),
            'preparation_time' =>  fake()->randomElement([fake()->numberBetween(1, 100)]),
            'other_details' => fake()->randomElement([fake()->paragraph()]),
            'user_id' => User::inRandomOrder()->first(),
        ];
    }
}
