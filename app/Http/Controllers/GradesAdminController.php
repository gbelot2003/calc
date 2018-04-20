<?php

namespace App\Http\Controllers;

use App\Configuraciones;
use App\Grade;
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
        $odd = true;
        return View('grades.index', compact('grades', 'totals', 'odd', 'config'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateGrades(Request $request)
    {
        $grade = Grade::findOrFail($request->get('id'));
        $grade->price = $request->get('price');
        $grade->save();

        flash('Registro actualizado.')->success();
        return redirect()->to('/admin/grades/');
    }

    public function updateTotals(Request $request)
    {
        $total = Total::findOrFail($request->get('id'));
        $total->update($request->all());

        flash('Registro actualizado.')->success();
        return redirect()->to('/admin/grades/');
    }

    public function updateConfig(Request $request)
    {
        //dd($request->all());
        $config = Configuraciones::findOrFail($request->get('id'));

        if($request->has('pregunta_a')){
            $request['pregunta_a'] = true;
        } else {
            $request['pregunta_a'] = false;
        }

        $config->update($request->all());

        flash('Registro actualizado.')->success();
        return redirect()->to('/admin/grades/');
    }


}
