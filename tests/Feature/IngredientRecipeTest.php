<?php

namespace Tests\Feature;

use App\Application\Models\Ingredient;
use App\Application\Models\Recipe;
use App\Application\Models\User;
use Tests\TestCase;

class IngredientRecipeTest extends TestCase
{
    /**
     * @test
     * @group  Feature/IngredientRecipe
     * @return void
     */
    public function test_should_attach_ingredient_to_recipe(): void
    {
        $user = User::factory()->create();
        $recipe = Recipe::factory()->create();
        $ingredients = Ingredient::factory()->count(3)->create();

        $this->assertNotEmpty($recipe);
        $this->assertNotEmpty($ingredients);

        $response = $this->actingAs($user)->post('/recipes', [
                'title' => $recipe->title,
                'description' => $recipe->description,
                'ingredients' => $ingredients->pluck('id')->toArray(),
                'instructions' => $recipe->instructions,
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcReYV3X0-3r-Rn84_67PNk4hz3_EYuR-rlqY3WUAM9TJKptoTm1KTbIHo8kZahiCtMsYOI&usqp=CAU',
            ]);

        $response->assertStatus(302);
        $response->assertRedirect('/recipes');
    }
}
