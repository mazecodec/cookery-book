<?php

namespace Tests\Feature;

use App\Application\Models\Ingredient;
use App\Application\Models\User;
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

        $this->assertAuthenticated();

        $response->assertSee(__('Ingredients'));
        $response->assertSee(__('List of ingredients'));
        $response->assertStatus(200);
    }

    /**
     * @test
     * @group  Feature/Ingredient
     * @return void
     */
    public function test_should_create_new_ingredient(): void
    {
        $user = User::factory()->create();
        $ingredient = Ingredient::factory()->create();

        $this->assertNotEmpty($ingredient);

        $response = $this->actingAs($user)->post('/ingredients', [
            'name' => $ingredient->name,
            'emoji' => $ingredient->emoji,
        ]);

        $this->assertAuthenticated();

        $response->assertRedirect('/ingredients');
        $response->assertStatus(302);
    }

    /**
     * @test
     * @group  Feature/Ingredient
     * @return void
     */
    public function test_should_update_ingredient()
    {
        $user = User::factory()->create();
        $ingredient = Ingredient::factory()->create();

        $this->assertNotEmpty($ingredient);

        $newName = 'name updated';
        $newEmoji = '🫥';

        $response = $this->actingAs($user)->put('/ingredients/' . $ingredient->id, [
            'name' => $newName,
            'emoji' => $newEmoji,
        ]);

        $this->assertAuthenticated();

        $response->assertRedirect('/ingredients');
        $response->assertStatus(302);

        $this->assertDatabaseHas('ingredients', [
            'name' => $newName,
            'emoji' => $newEmoji
        ]);

        $this->assertDatabaseMissing('ingredients', [
            'name' => $ingredient->name,
            'emoji' => $ingredient->emoji
        ]);
    }

    /**
     * @test
     * @group  Feature/Ingredient
     * @return void
     */
    public function test_should_delete_ingredient()
    {
        $user = User::factory()->create();
        $ingredient = Ingredient::factory()->create();

        $this->assertNotEmpty($ingredient);

        $this->assertDatabaseHas('ingredients', [
            'name' => $ingredient->name,
            'emoji' => $ingredient->emoji
        ]);

        $response = $this->actingAs($user)->delete('/ingredients/' . $ingredient->id);

        $this->assertAuthenticated();

        $response->assertRedirect('/ingredients');
        $response->assertStatus(302);

        $this->assertDatabaseMissing('ingredients', [
            'name' => $ingredient->name,
            'emoji' => $ingredient->emoji
        ]);
    }
}
