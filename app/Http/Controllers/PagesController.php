<?php

namespace App\Http\Controllers;

use Acme\calculos\CalculateTotales;
use App\Custom;
use App\Grade;
use App\Http\Requests\CustomRequest;
use App\Institute;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return View('pages.index');
    }

    /**
     * @param CustomRequest|Request $request
     * @return mixed
     */
    public function postInfo(CustomRequest $request)
    {
        $custom = Custom::create($request->all());
        $totales = new CalculateTotales();
        $tgral = $totales->calculateTotal($custom->id);

        return $tgral;
    }

    public function unactive()
    {
        return View('pages.inactive');
    }

}
