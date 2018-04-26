<?php

namespace App\Http\Controllers;

use App\Configuraciones;
use App\Grade;
use App\Plan;
use App\Total;
use Illuminate\Http\Request;

class GradesAdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('statusCheck');
    }

    public function index()
    {
        $grades = Grade::all();
        $totals = Total::all();
        $config = Configuraciones::first();
        $planes = Plan::all();

        $odd = true;
        return View('grades.index', compact('grades', 'totals', 'odd', 'config', 'planes'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateGrades(Request $request)
    {
        $this->validate($request, [
            'id' => 'integer|required',
            'price' => 'required|numeric'
        ]);

        $grade = Grade::findOrFail($request->get('id'));
        $grade->price = $request->get('price');
        $grade->save();

        flash('Registro actualizado.')->success();
        return redirect()->to('/admin/grades/');
    }

    public function updateTotals(Request $request)
    {
        $this->validate($request, [
            'id' => 'integer|required',
            'name' => 'required|string',
            'subtitle' => 'required|string',
            'porcent' => 'required|numeric'
        ]);

        $total = Total::findOrFail($request->get('id'));
        $total->update($request->all());

        flash('Registro actualizado.')->success();
        return redirect()->to('/admin/grades/');
    }

    public function updateConfig(Request $request)
    {
        $config = Configuraciones::findOrFail($request->get('id'));

        if($request->has('pregunta_a')){
            $request['pregunta_a'] = 1;
        } else {
            $request['pregunta_a'] = 0;
        }

        $this->validate($request, [
            'id' => 'integer|required',
            'name' => 'required|string',
            'pregunta_a' => 'required|boolean'
        ]);


        $config->update($request->all());

        flash('Registro actualizado.')->success();
        return redirect()->to('/admin/grades/');
    }


    public function updatePlans(Request $request)
    {
        $plan = Plan::findOrFail($request->get('id'));

        if($request->has('show')){
            $request['show'] = 1;
        } else {
            $request['show'] = 0;
        }

        $plan->update($request->all());


        flash('Registro actualizado.')->success();
        return redirect()->to('/admin/grades/');



    }

}
