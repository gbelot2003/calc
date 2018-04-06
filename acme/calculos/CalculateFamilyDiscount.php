<?php
namespace Acme\calculos;

use App\FamilyDiscount;

class CalculateFamilyDiscount{

    /**
     * @param $id
     * @return mixed
     */
    private function getFamilyDiscount($id)
    {
        return $this->familyDiscountValue( $id );
    }

    /**
     * @param $id
     * @param $value
     * @return mixed
     */
    public function calculateDiscountTotalByIdAndValue( $id, $value )
    {
        $discountValue = $this->calculateDicountValue( $id, $value );
        return $value - $discountValue;
    }

    /**
     * @param $id
     * @param $value
     * @return float|int
     */
    private function calculateDicountValue($id, $value)
    {
        return ($value * $this->getFamilyDiscount($id)) / 100;
    }

    /**
     * @param $id
     * @return int
     */
    private function familyDiscountValue($id)
    {
        if ($id == 0) {
            return 0;
        } else {
            $total = FamilyDiscount::findOrFail( $id );
            return $total->porcent;
        }
    }
}