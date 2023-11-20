<?php

namespace Tests\Feature;

use App\Models\Ingredient;
use App\Models\User;
use Tests\TestCase;

class IngredientTest extends TestCase
{
    /**
     * @test
     * @group  Feature/Ingredient
     * @return void
     */
    public function test_should_get_list_of_ingredients(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/ingredients');
        $response->assertSee(__('Ingredients'));
        $response->assertSee(__('Add new ingredient'));

        $response->assertStatus(200);
    }
}
