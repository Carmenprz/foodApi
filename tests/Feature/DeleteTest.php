<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Dish;

class DeleteTest extends TestCase
{
    use RefreshDatabase;
    public function test_delete_a_dish()
    {
        Dish::factory()->create(); 

        $response = $this->deleteJson('/api/dishes/1');

        $response->assertStatus(204);
    }

    public function test_fail_if_dish_does_not_exist()
    {
        $this->withoutExceptionHandling(); 

        $response = $this->deleteJson('/api/dishes/1');

        $response->assertStatus(404);
    }
}
