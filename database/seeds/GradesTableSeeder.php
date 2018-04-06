<?php

use Illuminate\Database\Seeder;

class GradesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('grades')->delete();
        
        \DB::table('grades')->insert(array (
            0 => 
            array (
                'id' => '1',
                'name' => 'Toodler',
                'price' => '3750.0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => '2',
                'name' => 'Nursery',
                'price' => '3900.0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => '3',
                'name' => 'Pre Kinder',
                'price' => '4310.0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => '4',
                'name' => 'Kinder',
                'price' => '4730.0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => '5',
                'name' => 'Primer Grado',
                'price' => '5460.0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => '6',
                'name' => 'Segundo Grado',
                'price' => '5940.0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => '7',
                'name' => 'Tercer Grado',
                'price' => '6040.0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => '8',
                'name' => 'Cuarto Grado',
                'price' => '6040.0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => '9',
                'name' => 'Quinto Grado',
                'price' => '6040.0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => '10',
                'name' => 'Sexto Grado',
                'price' => '6300.0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => '11',
                'name' => 'Septimo Grado',
                'price' => '6510.0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => '12',
                'name' => 'Octavo Grado',
                'price' => '6720.0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => '13',
                'name' => 'Noveno Grado',
                'price' => '7140.0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => '14',
                'name' => 'Decimo Grado',
                'price' => '7140.0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => '15',
                'name' => 'Onceavo Grado',
                'price' => '7240.0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => '16',
                'name' => 'Doceavo Grado',
                'price' => '7420.0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}