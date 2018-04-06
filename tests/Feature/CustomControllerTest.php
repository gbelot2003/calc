<?php

namespace Tests\Feature;

use App\Custom;
use App\Grade;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CustomControllerTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */

    /** @test */
    public function index_return_a_list_of_custom()
    {
        factory(Custom::class, 10)->create();

        $customs = Custom::all();

        $this->assertEquals($customs->count(), 10);
        /** tested */
    }

    /** @test */
    public function store_method_save_the_custom_and_retrives_it()
    {
        factory(Grade::class, 1)->create();

        $data = [
            'grade_id' => 1,
            'has_bros' => false,
            'bros' => 0,
            'name' => 'Test',
            'last' => 'Dummy',
            'phone' => 22223565,
            'email' => 'dummy@dummy.com',
        ];

        $this->post('/customs', $data)
            ->assertStatus(200);
        /** tested */
    }
}


