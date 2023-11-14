<?php

namespace Tests\Feature;

use App\Infrastructure\Models\Recipe;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CanGetRecipeList extends TestCase
{
//    use RefreshDatabase, WithFaker;

    public function test_can_get_recipe_list(): void
    {
        Recipe::factory()->count(10)->create();

        $response = $this->get('/recipes');

        $response->assertStatus(200);
    }
}
