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
        $this->withoutExceptionHandling();
        $dish = Dish::factory()->create();

        $response = $this->getJson(route('dishes.index', $dish), $dish->toArray());

        $response->assertStatus(200);
    }
}
