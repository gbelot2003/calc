<?php

namespace Tests\Unit;

use App\Custom;
use App\Grade;
use App\Institute;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CustomsTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function a_custom_has_fields()
    {
        //Mass Assing protection test, NOT against database registers
        $custom = new Custom([
            'name' => 'acme',
            'last' => 'Torno',
            'phone' => '22223355',
            'email' => 'info@info.com',
            'grade_id' => 2,
            'has_bros' => true,
        ]);

        $this->assertEquals('acme', $custom->name);
        $this->assertEquals('Torno', $custom->last);
        $this->assertEquals('22223355', $custom->phone);
        $this->assertEquals('info@info.com', $custom->email);
        $this->assertEquals('2', $custom->grade_id);
        $this->assertEquals(true, $custom->has_bros);
    }

    /** @test */
    public function a_custom_belongs_an_institute()
    {
        $institute = Institute::create([
            'name' => 'acme'
        ]);

        $custom = new Custom([
            'name' => 'Acme1',
            'last' => 'Torno',
            'phone' => '22223355',
            'email' => 'info@info.com',
            'institute_id' => $institute->id,
            'grade_id' => 2,
            'has_bros' => true,
        ]);

        $this->assertEquals('acme', $custom->institute->name);
    }

    /** @test */
    public function a_custom_belong_to_a_grade()
    {
        $grade = Grade::create([
            'name' => "acme",
            'institute_id' => 1,
            'price' => 100
        ]);

        $custom = new Custom([
            'name' => 'Acme1',
            'last' => 'Torno',
            'phone' => '22223355',
            'email' => 'info@info.com',
            'institute_id' => 4,
            'grade_id' => $grade->id,
            'has_bros' => true,
        ]);

        $this->assertEquals('acme', $custom->grade->name);

    }

}
