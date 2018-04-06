<?php
namespace Acme\calculos;

use App\Total;

class CalculateDiscounts
{

    /**
     * @param $id
     * @return mixed
     */
    public function getDiscountName($id)
    {
        $total = Total::findOrFail($id);
        return $total->name;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getDiscountSubTitle($id)
    {
        $total = Total::findOrFail($id);
        return $total->subtitle;
    }

    /**
     * @param $id
     * @return mixed
     */
    private function getDiscountPorcent($id)
    {
        $porcent = Total::findOrFail($id);
        return $porcent->porcent;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function calculateDiscountTotalByIdAndPrice($id, $value)
    {
        return ($value - $this->calculateDicountValue($id, $value)) / 12;
    }

    /**
     * @param $id
     * @param $value
     * @return float|int
     */
    private function calculateDicountValue($id, $value)
    {
        return ($value * $this->getDiscountPorcent($id)) / 100;
    }

}