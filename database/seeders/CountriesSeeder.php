<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert(array(
            0 => array(
                'id' => 1,
                'label' => 'Switzerland',
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            1 => array(
                'id' => 2,
                'label' => 'France',
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            2 => array(
                'id' => 3,
                'label' => 'Germany',
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            3 => array(
                'id' => 4,
                'label' => 'Italy',
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s"),
            ),
        ));
    }
}
