<?php

use Illuminate\Database\Seeder;

class FamilyDiscountsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('family_discounts')->delete();
        
        \DB::table('family_discounts')->insert(array (
            0 => 
            array (
                'id' => '1',
                'name' => 'A Son',
                'porcent' => '0',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => '2',
                'name' => 'Two Sons',
                'porcent' => '0 ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => '3',
                'name' => 'three Sons',
                'porcent' => '10',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => '4',
                'name' => 'Four or more',
                'porcent' => '10' ,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}