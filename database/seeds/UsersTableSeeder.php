<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Gerardo Belot',
                'email' => 'gbelot@sinergiacala.net',
                'state' => 1,
                'password' => '$2y$10$lpRvjpnfoAgqV3RAW/hWLu.u/eLwKnYs.5YS/TVAA/GuSDeQLox0C',
                'remember_token' => 'Amfw4rdLuzUhowb5MrjxI1UJDBenpl0ImdskJldCHuJeIkXtnnG2ZP46qyYx',
                'created_at' => '2017-05-23 05:36:38',
                'updated_at' => '2017-05-23 05:38:26',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Christian Morales',
                'email' => 'cmorales@sinergiacala.net',
                'state' => 1,
                'password' => '$2y$10$vbWeWfkfthgjoIS0dx9w5OL3kvdsh94HsTeNsZSwxTueh211P8U1K',
                'remember_token' => 'GFPbrRuFd1i5tCYkWhaoJmmKxDoGor5qHbTUaymzeb47BoGPFsf176hY7N5W',
                'created_at' => '2017-05-23 13:13:38',
                'updated_at' => '2017-05-23 16:06:49',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Jessica',
                'email' => 'jmercado@delcamposchool.org',
                'state' => 1,
                'password' => '$2y$10$fdrgqFjaxMu1dE0/mt8rgu/CCka5ZyFgdo21QR9EqhH2X.Jd8tIJm',
                'remember_token' => 'liU8stfLjBRCHqVDObVKGVTApQyttRMTgf2cQ60ahsk6VTKHtO18KU3GN9DA',
                'created_at' => '2017-05-23 16:27:12',
                'updated_at' => '2017-05-23 17:04:31',
            ),
        ));
        
        
    }
}