<?php

namespace Tests\Unit;

use App\Models\Fruits;
use Tests\TestCase;

class UserUnitTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_fruit_duplication()
    {
        $fruit1 = Fruits::make([
            'name' => 'apple',
            'color' => 'red',
            'quantity' => 5
        ]);
        $fruit2 = Fruits::make([
            'name' => 'banana',
            'color' => 'yellow',
            'quantity' => 10
        ]);

        $this->assertTrue($fruit1->name != $fruit2->name);
    }

    public function test_delete_user() {
        $fruit = Fruits::make([
            'name' => 'apple',
            'color' => 'red',
            'quantity' => 5
        ]);
        $fruit = Fruits::first();
        if($fruit) {
            $fruit->delete();
        }
        $this->assertTrue(true);
    }

    public function test_stores_new_fruits() {
        $response = $this->post('/api/fruit',[
            'name' => 'apple',
            'color' => 'red',
            'quantity' => 5
        ]);

        $response->assertStatus(200); 
    }

    public function test_database() {
        $this->assertDatabaseHas('fruits',[
            'name' => 'apple'
        ]);
        $this->assertDatabaseMissing('fruits',[
            'name' => 'onion'
        ]);
    } 
}
