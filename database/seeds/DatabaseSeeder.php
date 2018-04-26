<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TotalsTableSeeder::class);
        $this->call(GradesTableSeeder::class);
        $this->call(FamilyDiscountsTableSeeder::class);
        $this->call(ConfiguracionesTableSeeder::class);
        //$this->call(PlansTableSeeder::class);
    }
}
