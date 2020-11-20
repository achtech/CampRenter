<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class CamperReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('camper_reviews')->insert(array(
            0 => array(
                'id' => '1',
                'name' => 'achraf',
                'email' => 'achraf.saloumi@mail.com',
                'comment' => 'saloumi',
                'rate_service' => 1,
                'rate_cleanliness' => 4,
                'rate_managing' => 3,
                'id_campers' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            1 => array(
                'id' => '2',
                'name' => 'Brahim',
                'email' => 'brahim.barjai@mail.com',
                'comment' => 'nice camper',
                'rate_service' => 5,
                'rate_cleanliness' => 3,
                'rate_managing' => 2,
                'id_campers' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            2 => array(
                'id' => '3',
                'name' => 'Noura',
                'email' => 'noura.bouchbaat@mail.com',
                'comment' => 'Great camper',
                'rate_service' => 2,
                'rate_cleanliness' => 5,
                'rate_managing' => 4,
                'id_campers' => 2,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            3 => array(
                'id' => '4',
                'name' => 'Oumaima',
                'email' => 'oumaima.stitini@mail.com',
                'comment' => 'best camper',
                'rate_service' => 2,
                'rate_cleanliness' => 2,
                'rate_managing' => 3,
                'id_campers' => 2,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s"),
            ),
        ));
    }
}
