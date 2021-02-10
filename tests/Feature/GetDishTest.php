<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Dish;

use function PHPUnit\Framework\assertJson;

class GetDishTest extends TestCase
{
    use RefreshDatabase; 
    public function test_get_a_dish()
    {
        $dish = Dish::factory()->create([
            'name' => 'Curry',
            'id' => 1,
        ]); 

        $response = $this->getJson('/api/dishes/1');

        $response
            ->assertStatus(200)
            ->assertJsonFragment(['name' => 'Curry']);
    }
}
