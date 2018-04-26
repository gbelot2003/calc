<?php

use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('plans')->delete();
        
        \DB::table('plans')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Plan 1',
                'discountext' => '1 Cuota pagadera en Junio de',
                'porcent' => 7,
                'porcentext' => 'El descuento sobre plan de contado 1 cuota es del ',
                'context' => 'A',
                'show' => 1,
                'created_at' => '2018-04-26 09:25:10',
                'updated_at' => '2018-04-26 09:25:11',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Plan 2',
                'discountext' => '2 Cuotas pagaderas en Junio y Diciembre',
                'porcent' => 3,
                'porcentext' => 'El descuento sobre plan de contado 2 cuotas es de',
                'context' => 'B',
                'show' => 1,
                'created_at' => '2018-04-26 09:30:20',
                'updated_at' => '2018-04-26 09:30:21',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Plan 3',
                'discountext' => NULL,
                'porcent' => NULL,
                'porcentext' => NULL,
                'context' => 'A',
                'show' => 1,
                'created_at' => '2018-04-26 09:30:46',
                'updated_at' => '2018-04-26 09:30:47',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Plan 4',
                'discountext' => NULL,
                'porcent' => NULL,
                'porcentext' => NULL,
                'context' => 'B',
                'show' => 1,
                'created_at' => '2018-04-26 09:31:08',
                'updated_at' => '2018-04-26 09:31:08',
            ),
            4 => 
            array (
                'id' => 5,
                'title' => 'Plan 55',
                'discountext' => NULL,
                'porcent' => NULL,
                'porcentext' => NULL,
                'context' => NULL,
                'show' => 1,
                'created_at' => '2018-04-26 09:31:29',
                'updated_at' => '2018-04-26 09:31:29',
            ),
        ));
        
        
    }
}