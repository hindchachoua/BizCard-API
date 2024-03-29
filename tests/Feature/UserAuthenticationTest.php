<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserAuthenticationTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function test_user_can_register()
    {
        $response = $this->postJson('/api/register', [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(201)->assertJsonStructure([
            'user' => [
                'id',
                'name',
                'email',
                'created_at',
                'updated_at',
            ],
            'token',
        ]);
    }

    public function test_user_can_login()
    {
        // Create a user using Laravel factory
        $user = User::factory()->create([
            'password' => bcrypt('password'),
        ]);
    
        $response = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => 'password', // Use the correct password here
        ]);
    
        $response->assertStatus(200)->assertJsonStructure([
            'user' => [
                'id',
                'name',
                'email',
                'created_at',
                'updated_at',
            ],
            'token',
        ]);
    }
    

}
