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
                'id' => 3,
                'name' => 'Con tarjeta de BAC Credomatic Economía 7%',
                'porcent' => 7.0,
                'created_at' => '2017-05-03 01:19:33',
                'updated_at' => '2017-05-03 01:19:32',
                'subtitle' => 'Credomatic Economía 7% Descuento',
            ),
            2 =>
            array (
                'id' => 4,
                'name' => 'Débito automático FICOHSA Credomatic 10%',
                'porcent' => 10.0,
                'created_at' => '2017-05-03 01:19:35',
                'updated_at' => '2017-05-03 01:19:34',
                'subtitle' => 'Débito automático 10%',
            ),
        ));
        
        
    }
}