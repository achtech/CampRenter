<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class InsurancesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('insurances')->insert(array(
            0 => array(
                'id' => 1,
                'id_camper_categories' => 1,
                'nbr_days_from' => 0,
                'nbr_days_to' => 6,
                'tonage' => '<=3',
                'initial_price' => 0,
                'price_per_day' => 22,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s")
            ),
            1 => array(
                'id' => 2,
                'id_camper_categories' => 1,
                'nbr_days_from' => 7,
                'nbr_days_to' => 13,
                'tonage' => '<=3',
                'initial_price' => 140,
                'price_per_day' => 5,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s")
            ),
            2 => array(
                'id' => 3,
                'id_camper_categories' => 1,
                'nbr_days_from' => 14,
                'nbr_days_to' => 1000,
                'tonage' => '<=3',
                'initial_price' => 175,
                'price_per_day' => 3,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s")
            ),
            3 => array(
                'id' => 4,
                'id_camper_categories' => 1,
                'nbr_days_from' => 0,
                'nbr_days_to' => 6,
                'tonage' => '>3',
                'initial_price' => 0,
                'price_per_day' => 24,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s")
            ),
            4 => array(
                'id' => 5,
                'id_camper_categories' => 1,
                'nbr_days_from' => 7,
                'nbr_days_to' => 13,
                'tonage' => '>3',
                'initial_price' => 160,
                'price_per_day' => 5,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s")
            ),
            5 => array(
                'id' => 6,
                'id_camper_categories' => 1,
                'nbr_days_from' => 14,
                'nbr_days_to' => 1000,
                'tonage' => '>3',
                'initial_price' => 200,
                'price_per_day' => 4,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s")
            ),
            6 => array(
                'id' => 7,
                'id_camper_categories' => 3,
                'nbr_days_from' => 0,
                'nbr_days_to' => 6,
                'tonage' => '1=1',
                'initial_price' => 0,
                'price_per_day' => 10,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s")
            ),
            7 => array(
                'id' => 8,
                'id_camper_categories' => 3,
                'nbr_days_from' => 7,
                'nbr_days_to' => 13,
                'tonage' => '1=1',
                'initial_price' => 65,
                'price_per_day' => 3.5,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s")
            ),
            8 => array(
                'id' => 9,
                'id_camper_categories' => 3,
                'nbr_days_from' => 14,
                'nbr_days_to' => 1000,
                'initial_price' => 90,
                'price_per_day' => 1.5,
                'tonage' => '1=1',
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s")
            ),
            9 => array(
                'id' => 10,
                'id_camper_categories' => 2,
                'nbr_days_from' => 0,
                'nbr_days_to' => 6,
                'tonage' => '<=3',
                'initial_price' => 0,
                'price_per_day' => 23,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s")
            ),
            10 => array(
                'id' => 11,
                'id_camper_categories' => 2,
                'nbr_days_from' => 7,
                'nbr_days_to' => 13,
                'tonage' => '<=3',
                'initial_price' => 135,
                'price_per_day' => 6 ,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s")
            ),
            11 => array(
                'id' => 12,
                'id_camper_categories' => 2,
                'nbr_days_from' => 14,
                'nbr_days_to' => 1000,
                'tonage' => '<=3',
                'initial_price' => 180,
                'price_per_day' => 3.5,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s")
            ),
            12 => array(
                'id' => 13,
                'id_camper_categories' => 2,
                'nbr_days_from' => 0,
                'nbr_days_to' => 6,
                'tonage' => '>3',
                'initial_price' => 0,
                'price_per_day' => 23,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s")
            ),
            13 => array(
                'id' => 14,
                'id_camper_categories' => 2,
                'nbr_days_from' => 7,
                'nbr_days_to' => 13,
                'tonage' => '>3',
                'initial_price' => 135,
                'price_per_day' => 6 ,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s")
            ),
            14 => array(
                'id' => 15,
                'id_camper_categories' => 2,
                'nbr_days_from' => 14,
                'nbr_days_to' => 1000,
                'tonage' => '>3',
                'initial_price' => 175,
                'price_per_day' => 3,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s")
            ),
        ));
    }
}
