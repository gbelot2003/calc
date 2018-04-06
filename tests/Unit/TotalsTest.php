<?php

namespace Tests\Unit;

use App\Total;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TotalsTest extends TestCase
{

    use DatabaseTransactions;

    /** @test */
    public function a_total_has_fields()
    {
        //Mass Assing protection test, NOT against database registers
        $total = Total::create([
            'name' => 'acme',
            'porcent' => 10
        ]);

        $this->assertEquals('acme', $total->name);
        $this->assertEquals(10, $total->porcent);
    }
}
