<?php

namespace Tests\Feature;
use App\Models\User;
use App\Models\Card;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;



class CardTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_store_card()
    {
        // Mock an authenticated user
        $user = User::factory()->create();
        $this->actingAs($user);
    
        // Create data for the card
        $cardData = [
            'title' => 'Test Card',
            'description' => 'This is a test card',
            'phonenumber' => '1234567890',
            'email' => 'test@example.com',
            'address' => '123 Test St',
        ];
    
        // Send a POST request to the store endpoint
        $response = $this->postJson('/api/newcard', $cardData);
    
        // Assert the response status code is 201 (Created)
        $response->assertStatus(201);
    
        // Assert the response JSON structure
        $response->assertJsonStructure([
            'id',
            'title',
            'description',
            'phonenumber',
            'email',
            'address',
            'user_id',
            'created_at',
            'updated_at',
        ]);
    
        // Optionally, assert specific data in the response
        $response->assertJson([
            'title' => $cardData['title'],
            'description' => $cardData['description'],
            'phonenumber' => $cardData['phonenumber'],
            'email' => $cardData['email'],
            'address' => $cardData['address'],
            'user_id' => $user->id,
        ]);
    }
    
    public function test_update_card()
    {
        // Create a user
        $user = User::factory()->create();

        // Create a card for the user
        $card = Card::factory()->create(['user_id' => $user->id]);

        // Mock an authenticated user
        $this->actingAs($user);

        // New data for updating the card
        $updatedData = [
            'title' => 'Updated Title',
            'description' => 'Updated Description',
            'phonenumber' => '9876543210',
            'email' => 'updated@example.com',
            'address' => '456 Updated St',
        ];

        // Send a PUT request to the update endpoint
        $response = $this->putJson('/api/cards/' . $card->id, $updatedData);

        // Assert the response status code is 200 (OK)
        $response->assertStatus(200);

        // Assert the response JSON structure
        $response->assertJsonStructure([
            'id',
            'title',
            'description',
            'phonenumber',
            'email',
            'address',
            'user_id',
            'created_at',
            'updated_at',
        ]);

        // Assert the card has been updated in the database
        $this->assertDatabaseHas('cards', $updatedData);
    }

    /**
     * Test deleting a card.
     *
     * @return void
     */
    public function test_delete_card()
{
    // Create a user
    $user = User::factory()->create();

    // Create a card for the user
    $card = Card::factory()->create(['user_id' => $user->id]);

    // Mock an authenticated user
    $this->actingAs($user);

    // Send a DELETE request to the destroy endpoint
    $response = $this->deleteJson('/api/cards/' . $card->id);

    // Assert the response status code is 200 (OK)
    $response->assertStatus(200);

    // Assert the card has been deleted from the database
    $this->assertDatabaseMissing('cards', ['id' => $card->id]);
}
}
