<?php

use Illuminate\Database\Seeder;

class TotalsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('totals')->delete();
        
        \DB::table('totals')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Valor normal de la cuota mensual
',
                'porcent' => 0.0,
                'created_at' => '2017-05-03 01:19:26',
                'updated_at' => '2017-05-03 01:19:28',
                'subtitle' => 'Normal',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Cuota por el programa DC a tu alcance 5%
',
                'porcent' => 5.0,
                'created_at' => '2017-05-03 01:19:31',
                'updated_at' => '2017-05-03 01:19:32',
                'subtitle' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Con tarjeta de DC BAC Credomatic Economía 7%',
                'porcent' => 7.0,
                'created_at' => '2017-05-03 01:19:33',
                'updated_at' => '2017-05-03 01:19:32',
                'subtitle' => 'Credomatic Economia 7% Descuento',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Débito automático FICOHSA o DC Credomatich 10%',
                'porcent' => 10.0,
                'created_at' => '2017-05-03 01:19:35',
                'updated_at' => '2017-05-03 01:19:34',
                'subtitle' => 'Debito Automatico',
            ),
        ));
        
        
    }
}