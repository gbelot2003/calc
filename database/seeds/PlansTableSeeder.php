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
                'name' => 'Plan 1',
                'body' => '<p class="text-xs-center">1 Cuota pagadera en Junio de US<span class="minimum-price">$6,640.20</span></p>',
                'position' => 1,
                'colors' => 'red darken-4',
                'show' => 1,
                'created_at' => '2018-04-25 15:29:14',
                'updated_at' => '2018-04-25 15:29:14',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Plan 2',
                'body' => '<p class="text-xs-center">1 Cuota pagadera en Junio de US<span class="minimum-price">$6,640.20</span></p>',
                'position' => 2,
                'colors' => 'light-blue darken-3',
                'show' => 1,
                'created_at' => '2018-04-25 15:32:54',
                'updated_at' => '2018-04-25 15:32:55',
            ),
        ));
        
        
    }
}