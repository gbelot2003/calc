<?php

namespace App\Http\Controllers;

use App\Custom;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
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

    /**
     * @return array
     */
    public function getExportExcel($buscar, $desde, $hasta)
    {

        if ($buscar == 'null' && $desde == 'null' && $hasta == 'null') {
            return redirect()->to(route('admin.dashboard'));
        }

        $query = Custom::select(
            'customs.id',
            'customs.parent_name as nombre_padres',
            'customs.parent_last as apellido_padres',
            'g.name as grado_cotizado',
            'customs.name as nombre_alumno',
            'customs.last as apellido_alumno',
            'customs.phone as telefono',
            'customs.phone_aditional as telefono_adicional',
            'customs.email',
            'customs.question as como_conocio_gdc',
            'customs.bros as hermanos',
            'customs.created_at as fecha_creacion'
        );

        $query->join('grades as g', 'customs.grade_id', '=', 'g.id');

        if ($desde != 'null' && $hasta != 'null') {

            $bdate = Carbon::createFromFormat('Y-m-d', $desde)->startOfDay();
            $edate = Carbon::createFromFormat('Y-m-d', $hasta)->endOfDay();

            $query->whereBetween('customs.updated_at', [$bdate, $edate]);
        }

        if ($buscar != 'null') {

            $query->where('customs.name', 'like', '%' . $buscar . '%');
            $query->orWhere('customs.last', 'like', '%' . $buscar . '%');
            $query->orWhere('customs.email', 'like', '%' . $buscar . '%');
            $query->orWhere('customs.phone', 'like', '%' . $buscar . '%');
        }

        $data = $query->orderBy('customs.created_at', 'DESC')
            ->limit(1500)
            ->get();


        $return = Excel::create('Export Data', function ($excel) use ($data) {
            $excel->sheet('Sheet 1', function ($sheet) use ($data) {
                $sheet->fromArray($data);
            });
        })->export('xls');

        return 200;
    }
}
