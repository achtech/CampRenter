<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class camperTermsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('camper_terms')->insert(array(
            0 => array(
                'id' => 1,
                'season' => 'main',
                'price_per_night' => 129,
                'minimum_night' => 120,
                'start_month' => 7,
                'end_month' => 8,
                'id_campers' => 6,
            ),
            1 => array(
                'id' => 2,
                'season' => 'Off_may',
                'price_per_night' => 124,
                'minimum_night' => 300,
                'start_month' => 5,
                'end_month' => 6,
                'id_campers' => 6,
            ),
            2 => array(
                'id' => 3,
                'season' => 'Off_sept',
                'price_per_night' => 129,
                'minimum_night' => 200,
                'start_month' => 9,
                'end_month' => 10,
                'id_campers' => 1,
            ),
            3 => array(
                'id' => 4,
                'season' => 'winter',
                'price_per_night' => 129,
                'minimum_night' => 100,
                'start_month' => 11,
                'end_month' => 4,
                'id_campers' => 6,
            ),
        ));
    }
}
