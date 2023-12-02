<?php

namespace Database\Seeders;

use App\Application\Models\Ingredient;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ingredients = file_get_contents(app_path('Shared/ingredients.json'));
        $ingredients = json_decode($ingredients, true);

        if (is_array($ingredients) && isset($ingredients['ingredients'])) {
            $ingredients = $ingredients['ingredients'];
        }

        Ingredient::factory()->count(count($ingredients))->sequence(
            fn(Sequence $sequence) => [
                'name' => $ingredients[$sequence->index]['english'],
                'emoji' => $ingredients[$sequence->index]['emoticon'],
            ]
        )->create();

    }
}
