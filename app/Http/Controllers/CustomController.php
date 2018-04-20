<?php

namespace App\Http\Controllers;

use Acme\calculos\Discounts;
use App\Configuraciones;
use App\Custom;
use App\Grade;
use App\Http\Requests\CustomRequest;

class CustomController extends Controller
{

    public function __construct()
    {

    }

    public function index(){}

    /**
     * @param CustomRequest $request
     * @return array
     */
    public function store(CustomRequest $request)
    {
        $custom = Custom::create($request->all());
        $totales = new Discounts();
        $tgral = $totales->getDiscountTotal($custom->grade_id, $custom->bros);


        return $tgral;
    }

    public function getPrice($id)
    {
        $grade = Grade::findOrFail($id);
        return $grade->price;
    }
}
