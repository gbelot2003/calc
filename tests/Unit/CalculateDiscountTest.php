<?php

namespace Tests\Unit;

use Acme\calculos\CalculateDiscounts;
use Acme\calculos\CalculateFamilyDiscount;
use Acme\calculos\CalculateTotalDiscount;
use App\FamilyDiscount;
use App\Grade;
use App\Total;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CalculateDiscountTest extends TestCase
{

    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */

    /** @test */
    public function a_class_discount_have_a_name()
    {
        factory(Total::class, 1)->create(['id' => 1, 'name' => "VALOR NORMAL DE LA CUOTA"]);

        $calculo = new CalculateDiscounts();
        $name = $calculo->getDiscountName(1);

        $this->assertEquals("VALOR NORMAL DE LA CUOTA", $name);
        /**
         * green
         */
    }

    /** @test */
    public function a_discount_get_total_of_fiscount()
    {
        factory(Total::class, 1)->create(['id' => 1, 'porcent' => 10]);
        $calculo = new CalculateDiscounts();

        $total = $calculo->calculateDiscountTotalByIdAndPrice(1, 100);

        $this->assertEquals(90, $total);
        /**
         * Green
         */
    }


    /** @test */
    public function calculate_total_discoun_family_total()
    {
        factory(FamilyDiscount::class, 1)->create(['porcent' => 5]);
        $calculo = new CalculateFamilyDiscount();
        $total = $calculo->calculateDiscountTotalByIdAndValue(1, 100);

        $this->assertEquals(95, $total);
        /**
         * green
         */
    }

    /** @test */
    public function calculate_total_discounts()
    {
        factory(Total::class, 1)->create(['id' => 1, 'porcent' => 10]);
        factory(FamilyDiscount::class, 1)->create(['id' => 1, 'porcent' => 10]);
        factory(Grade::class, 1)->create(['id' => 1, 'price' => 200]);

        $calculo = new CalculateTotalDiscount();
        $total = $calculo->calculateDiscounts(1, 1);

        $this->assertEquals(162, $total);
    }

    /** @test */
    public function calculate_total_discounts_no_bros()
    {
        factory(Total::class, 1)->create(['id' => 1, 'porcent' => 10]);
        factory(Grade::class, 1)->create(['id' => 1, 'price' => 200]);

        $calculo = new CalculateTotalDiscount();
        $total = $calculo->calculateDiscounts(1, 0);

        $this->assertEquals(180, $total);
        /**
         * green
         */
    }
}
