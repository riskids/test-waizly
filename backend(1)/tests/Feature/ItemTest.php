<?php

namespace Tests\Feature;

use App\Models\Items;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ItemTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function authenticate()
    {
        $user = User::factory()->create([
            'password' => Hash::make('password'), // Set your default password
        ]);

        $this->actingAs($user);

        return $user;
    }

    /** @test */
    public function authenticated_user_can_get_items()
    {
        $user = $this->authenticate();

        $response = $this->getJson('api/item');

        $response->assertStatus(200);
    }

    /** @test */
    public function authenticated_user_can_create_item()
    {
        $user = $this->authenticate();

        $itemData = [
            'item_name' => $this->faker->word,
            'stock_quantity' => $this->faker->numberBetween(1, 100),
            'unit_price' => $this->faker->numberBetween(10, 100),
        ];

        $response = $this->postJson('api/item/store', $itemData);

        $response->assertStatus(201);
        $this->assertDatabaseHas('items', $itemData);
    }

    /** @test */
    public function authenticated_user_can_update_item()
    {
        $user = $this->authenticate();

        $item = Items::factory()->create();

        $updatedData = [
            'item_name' => $this->faker->word,
            'stock_quantity' => $this->faker->numberBetween(1, 100),
            'unit_price' => $this->faker->numberBetween(10, 100),
        ];

        $response = $this->postJson("api/item/update/{$item->item_code}", $updatedData);

        $response->assertStatus(200);
        $this->assertDatabaseHas('items', $updatedData);
    }

    /** @test */
    public function authenticated_user_can_get_item_detail()
    {
        $user = $this->authenticate();

        $item = Items::factory()->create();

        $response = $this->getJson("api/item/detail/{$item->item_code}");

        $response->assertStatus(200);
    }

    /** @test */
    public function authenticated_user_can_delete_item()
    {
        $user = $this->authenticate();

        $item = Items::factory()->create();

        $response = $this->postJson("api/item/delete/{$item->item_code}");

        $response->assertStatus(200);
        $this->assertDatabaseMissing('items', ['item_code' => $item->item_code]);
    }
}
