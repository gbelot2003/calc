<?php
namespace Acme\calculos;

use App\Configuraciones;
use App\Plan;

class Discounts{

    public function getDiscountTotal($grade_id, $bros)
    {
        $calculate = new CalculateTotalDiscount();
        $config = Configuraciones::first();
        $plans = Plan::all();


        return [
            'plans' => $plans,
            'config_name' => $config->name,
            array(
                'subtitle' => $calculate->getDiscountSubTitle(1),
                'title' => $calculate->getDiscountName(1),
                'total' => $calculate->calculateDiscounts($grade_id, $bros, 1)),
            array(
                'subtitle' => $calculate->getDiscountSubTitle(2),
                'title' => $calculate->getDiscountName(2),
                'total' => $calculate->calculateDiscounts($grade_id, $bros, 2)),
            array(
                'subtitle' => $calculate->getDiscountSubTitle(3),
                'title' => $calculate->getDiscountName(3),
                'total' => $calculate->calculateDiscounts($grade_id, $bros, 3)),
        ];
    }
}
