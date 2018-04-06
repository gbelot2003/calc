<?php
namespace Acme\calculos;

use App\Grade;
use Acme\calculos\CalculateDiscounts;

class CalculateTotalDiscount{

    /**
     * CalculateTotalDiscount constructor.
     * @internal param \Acme\calculos\CalculateDiscounts $calculate
     */
    public function __construct()
    {
        $this->calculate = new CalculateDiscounts();
    }

    /**
     * @param $total_id
     * @return mixed
     */
    public function getDiscountName($total_id)
    {
        return $this->calculate->getDiscountName($total_id);
    }

    /**
     * @param $total_id
     * @return mixed
     */
    public function getDiscountSubTitle($total_id)
    {
        return $this->calculate->getDiscountSubTitle($total_id);
    }

    /**
     * @param $grade_id
     * @param $bros
     * @param $total_id
     * @return mixed
     */
    public function calculateDiscounts($grade_id, $bros, $total_id)
    {
        $iniValue = Grade::findOrFail($grade_id);

        $dicountFamilyAddValue = $this->calculateBros( $bros, $iniValue );

        return $this->calculate->calculateDiscountTotalByIdAndPrice($total_id, $dicountFamilyAddValue);
    }

    /**
     * @param $grade_id
     * @param $iniValue
     * @return mixed
     */
    private function calculateFamilyDiscount($grade_id, $iniValue)
    {
        $familyDiscount = new CalculateFamilyDiscount();

        return $familyDiscount->calculateDiscountTotalByIdAndValue( $grade_id, $iniValue->price );
    }

    /**
     * @param $bros
     * @param $iniValue
     * @return mixed
     */
    private function calculateBros($bros, $iniValue)
    {
        if ($bros >= 4) {
            $dicountFamilyAddValue = $this->calculateFamilyDiscount( 4, $iniValue );
        } else {
            $dicountFamilyAddValue = $this->calculateFamilyDiscount( $bros, $iniValue );
        }
        return $dicountFamilyAddValue;
    }
}