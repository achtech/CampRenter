<?php

namespace Database\Seeders;

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
                'season' => 'Main season (Jul - Aug)',
                'price_per_night' => 129,
                'minimum_night' => 6,
                'id_campers' => 1,
            ),
            1 => array(
                'id' => 1,
                'season' => 'Off season (May - Jun & Sep - Oct)',
                'price_per_night' => 124,
                'minimum_night' => 4,
                'id_campers' => 1,
            ),
            2 => array(
                'id' => 1,
                'season' => 'Winter-season (Nov - Apr)',
                'price_per_night' => 129,
                'minimum_night' => 4,
                'id_campers' => 1,
            ),
        ));
    }
}
