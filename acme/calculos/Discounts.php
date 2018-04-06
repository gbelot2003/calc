<?php
namespace Acme\calculos;

class Discounts{

    public function getDiscountTotal($grade_id, $bros)
    {
        $calculate = new CalculateTotalDiscount();

        return [
            array(
                'subtitle' => $calculate->getDiscountSubTitle(1),
                'title' => $calculate->getDiscountName(1),
                'total' => $calculate->calculateDiscounts($grade_id, $bros, 1)),
            array(
                'subtitle' => $calculate->getDiscountSubTitle(3),
                'title' => $calculate->getDiscountName(3),
                'total' => $calculate->calculateDiscounts($grade_id, $bros, 3)),
            array(
                'subtitle' => $calculate->getDiscountSubTitle(4),
                'title' => $calculate->getDiscountName(4),
                'total' => $calculate->calculateDiscounts($grade_id, $bros, 4)),
        ];
    }
}
