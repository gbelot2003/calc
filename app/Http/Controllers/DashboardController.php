<?php

namespace App\Http\Controllers;

use App\Custom;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware( 'auth' );
        $this->middleware( 'statusCheck' );

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Custom::orderBy( 'created_at', 'DESC' );

        if (request()->has( 'desde' ) && \request()->has('hasta')) {

            $desde = request()->get( 'desde' );
            $hasta = request()->get( 'hasta' );


            $bdate = Carbon::createFromFormat( 'Y-m-d', $desde )->startOfDay();
            $edate = Carbon::createFromFormat( 'Y-m-d', $hasta )->endOfDay();

            $query->whereBetween( 'updated_at', [$bdate, $edate] );

        }

        if (request()->has( 'buscar' )) {
            $buscar = request()->get( 'buscar' );

            $query->where( 'name', 'like', '%' . $buscar . '%' );
            $query->orWhere( 'last', 'like', '%' . $buscar . '%' );
            $query->orWhere( 'email', 'like', '%' . $buscar . '%' );
            $query->orWhere( 'phone', 'like', '%' . $buscar . '%' );
        }

        $data = $query->limit( 1500 )
            ->paginate( 10 )
            ->appends( [
                'buscar' => \request()->get( 'buscar' ),
                'desde' => \request()->get( 'desde' ),
                'hasta' => \request()->get( 'hasta' )
            ] );


        return view( 'dashboard.index', compact( 'data','desde', 'hasta', 'buscar' ) );
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $query = Custom::findOrFail( $id );
        $query->delete();

        flash('Registro Eliminado.')->warning();
        return redirect()->to( route( 'admin.dashboard' ) );
    }


    public function deleteAll()
    {
        DB::table('customs')->truncate();
        flash('Registro Eliminado.')->warning();
        return redirect()->to(route('admin.dashboard'));
    }
}
