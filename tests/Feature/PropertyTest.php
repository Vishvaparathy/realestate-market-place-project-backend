<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Property;  // Ensure Property model is imported

class PropertyTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_property()
    {
        // Create a user
        $user = User::factory()->create();

        // Define the property data to send in the request
        $propertyData = [
            'title_en' => 'Test Property',
            'title_ta' => 'சோதனை சொத்து',
            'type' => 'House', 
            'location' => 'Colombo',
            'price' => 1500000,
            'size' => 1200,
            'bedrooms' => 3,
            'bathrooms' => 2,
            'description_en' => 'Nice test house',
            'description_ta' => 'நல்ல வீடு',
            'category' => 'Free',
            'is_agent' => false
        ];

        // Send the request as the authenticated user
        $response = $this->actingAs($user, 'sanctum')->postJson('/api/properties', $propertyData);

        // Debugging if response status is not 201
        if ($response->status() !== 201) {
            dump($response->status(), $response->json());
        }

        // Assert the status code is 201 (Created)
        $response->assertStatus(201);

        // Assert the response contains a success message or ID for the new property
        $response->assertJsonStructure([
            'id',
            'title_en',
            'title_ta',
            'type',
            'location',
            'price',
            'size',
            'bedrooms',
            'bathrooms',
            'description_en',
            'description_ta',
            'category',
            'is_agent',
        ]);

        // Optional: Assert the property was saved in the database
        $this->assertDatabaseHas('properties', [
            'title_en' => 'Test Property',
            'location' => 'Colombo',
            'price' => 1500000,
            'type' => 'House',
        ]);
    }
}
