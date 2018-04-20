<?php

use Illuminate\Database\Seeder;

class ConfiguracionesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('configuraciones')->delete();
        
        \DB::table('configuraciones')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '2019-2020',
                'pregunta_a' => false,
                'created_at' => '2018-04-20 09:36:20',
                'updated_at' => '2018-04-20 16:00:53',
            ),
        ));
        
        
    }
}