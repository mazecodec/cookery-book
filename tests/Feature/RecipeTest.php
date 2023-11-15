<?php

namespace Tests\Feature;

use App\Models\Recipe;
use App\Models\User;
use Database\Seeders\RecipeSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RecipeTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @group Feature/Recipe
     * @return void
     */
    public function test_can_get_recipes_list(): void
    {
        $this->seed(RecipeSeeder::class);

        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/recipes');

        $response->assertSee('Recipes');
        $response->assertSee('Recipe Title 1');

        $response->assertStatus(200);
        $this->assertAuthenticated();
    }

    /**
     * @test
     * @group Feature/Recipe
     * @return void
     */
    public function test_can_update_a_recipe(): void
    {
        $user = User::factory()->create();
        $recipe = Recipe::inRandomOrder()->first();
        $dataToUpdate = Recipe::factory()->make();

        $response = $this->actingAs($user)->patch(
            '/recipes/' . $recipe->id,
            $dataToUpdate->toArray(),
        );

        $this->assertDatabaseHas('recipes', [
            'title' => $dataToUpdate->title,
        ]);

        $response->assertRedirect('/recipes/' . $recipe->id);
    }

    /**
     * @test
     * @group Feature/Recipe
     * @return void
     */
    public function test_should_store_a_recipe(): void
    {
        $this->seed(RecipeSeeder::class);

        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/recipes', [
            'title' => 'Recipe Title 2',
            'description' => 'Recipe Description 2',
            'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcReYV3X0-3r-Rn84_67PNk4hz3_EYuR-rlqY3WUAM9TJKptoTm1KTbIHo8kZahiCtMsYOI&usqp=CAU'
        ]);

        $this->assertDatabaseHas('recipes', [
            'title' => 'Recipe Title 2',
        ]);
        $response->assertRedirect('/recipes');
    }

    /**
     * @test
     * @group Feature/Recipe
     * @return void
     */
    public function test_example(): void
    {
        $this->seed(RecipeSeeder::class);

        $user = User::factory()->create();
        $recipe = Recipe::inRandomOrder()->first();

        $response = $this->actingAs($user)->get('/recipes/' . $recipe->id);

        $response->assertSee($recipe->title);
        $response->assertSee($recipe->description);
        $response->assertStatus(200);
    }
}
