<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class InsuranceExtraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('insurance_extra')->insert(array(
            0 => array(
                'id' => 1,
                'name' => "Innenraumversicherung",
                'nbr_days_from' => 1,
                'nbr_days_to' => null,
                'initial_price' => 25,
                'price_per_day' => 3,
                'sub_extra' => null,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            1 => array(
                'id' => 2,
                'name' => "Assistance",
                'nbr_days_from' => 1,
                'nbr_days_to' => 10,
                'initial_price' => 16,
                'price_per_day' => 4,
                'sub_extra' => null,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            2 => array(
                'id' => 3,
                'name' => "Assistance",
                'nbr_days_from' => 11,
                'nbr_days_to' => null,
                'initial_price' => 56,
                'price_per_day' => 1,
                'sub_extra' => null,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            3 => array(
                'id' => 4,
                'name' => "Insassenunfall",
                'nbr_days_from' => 1,
                'nbr_days_to' => null,
                'initial_price' => 10,
                'price_per_day' => 1,
                'sub_extra' => 'Light',
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            4 => array(
                'id' => 5,
                'name' => "Insassenunfall",
                'nbr_days_from' => 1,
                'nbr_days_to' => null,
                'initial_price' => 20,
                'price_per_day' => 2,
                'sub_extra' => 'PLUS',
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            5 => array(
                'id' => 6,
                'name' => "Bonusverlust & Selbsbtbehalt",
                'nbr_days_from' => 1,
                'nbr_days_to' => null,
                'initial_price' => 7.5,
                'price_per_day' => 2.5,
                'sub_extra' => null,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_at' => date("Y-m-d h:i:s"),
            ),
        ));
    }
}
