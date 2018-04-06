<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Session;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PagesControllerTest extends TestCase
{
    use DatabaseTransactions;


    /** @test */
    public function controller_should_save_custom_form()
    {
        $custom  = [
            '_token' => Session::token(),
            'name' => 'Acme1',
            'last' => 'Torno',
            'phone' => '22223355',
            'email' => 'info@info.com',
            'institute_id' => 1,
            'grade_id' => factory(\App\Grade::class)->create(['price' => 70])->id,
            'has_bros' => true,
        ];

        $response = $this->call('POST', '/query', $custom);

        //$this->assertEquals(200, $response->getStatusCode());
        $response
            ->assertStatus(200);
        $this
            ->assertDatabaseHas('customs', ['name' => 'Acme1']);
    }

}
