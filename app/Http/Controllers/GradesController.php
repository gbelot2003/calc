<?php

namespace App\Http\Controllers;

use App\Grade;
use Illuminate\Http\Request;

class GradesController extends Controller
{

    /**
     * @return mixed
     */
    public function index()
    {
        $grades = Grade::select('name as label', 'id as value')->get();
        return $grades->toArray();
    }
}
