<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use RefreshDatabase;
    public function test_dishes_can_be_created_with_api_request()
    {
        $this->withoutExceptionHandling();

        $response = $this->
            postJson('/api/dishes', [
                'name' => 'Veggie Massala', 
                'subtitle' => 'with rice', 
                'price' => 20, 
                'description' => 'xfbfdb', 
                'image' => 'dish.jpeg'
                ]);

        $response
            ->assertStatus(201)
            ->assertJsonFragment(['name' => 'Veggie Massala']);
        
        $this->assertDatabaseCount('dishes', 1);
    }
}
