<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Dish;

class GetDishesTest extends TestCase
{
    use RefreshDatabase;
    public function test_get_all_dishes()
    {
        $dishes = Dish::factory()->create(4);

        $response = $this->getJson('/api/dishes', $dishes);

        $response->assertStatus(200);
    }
}
