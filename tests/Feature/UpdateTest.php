<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Dish;

class UpdateTest extends TestCase
{
    use RefreshDatabase;
    public function test_can_update_a_dish()
    {
        $this->withoutExceptionHandling(); 

        Dish::factory()->create([
            'name' => 'falafel', 
            'image' => 'fbeb',
            'id' => 1
        ]); 

        $dishUpdate = [
            'name' => 'Hummus',
            'subtitle' => 'dfbtb',
            'price' => 20,
            'description' => 'dfbtb',
            'image' => 'dfbtb',
        ];

        $response = $this->putJson('/api/dishes/1', $dishUpdate);

        $response->assertStatus(200)
            ->assertJsonFragment($dishUpdate);
    }
}
