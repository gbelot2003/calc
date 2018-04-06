<?php

namespace Tests\Unit;

use App\Custom;
use App\Grade;
use App\Institute;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GradeTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function a_grade_has_fields()
    {
        //Mass Assing protection test, NOT against database registers
        $grade = Grade::create([
            'name' => "acme",
            'institute_id' => 1,
            'price' => 100
        ]);

        $this->assertEquals('acme', $grade->name);
        $this->assertEquals(1, $grade->institute_id);
        $this->assertEquals(100, $grade->price);
    }

    /** @test */
    public function a_grade_belongs_to_a_institute()
    {
        $institute = Institute::create([
            'name' => 'acme'
        ]);

        $grade1 = Grade::create([
            'name' => "Acme2",
            'institute_id' => $institute->id,
            'price' => 98.50
        ]);

        $this->assertEquals('acme', $grade1->institute->name);
    }

    /** @test */
    public function a_grade_has_many_customs()
    {
        $grade1 = Grade::create([
            'name' => "Acme2",
            'institute_id' => 1,
            'price' => 98.50
        ]);

        $custom1 = Custom::create([
            'name' => 'Acme1',
            'last' => 'Torno',
            'phone' => '22223355',
            'email' => 'info@info.com',
            'institute_id' => 4,
            'grade_id' => $grade1->id,
            'has_bros' => true,
        ]);

        $custom2 = Custom::create([
            'name' => 'Acme2',
            'last' => 'Torno',
            'phone' => '22223355',
            'email' => 'info@info.com',
            'institute_id' => 4,
            'grade_id' => $grade1->id,
            'has_bros' => true,
        ]);

    $this->assertEquals(2, $grade1->customs->count());

    }
}
