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
                'description_en' => 'Insurances 1 en',
                'description_de' => 'Insurances 1 de',
                'description_fr' => 'Insurances 1 fr',
                'price_per_day' => 100,
                'id_insurance_companies' => 1,
                'id_camper_names' => 1,
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            1 => array(
                'id' => 2,
                'description_en' => 'Insurances 2 en',
                'description_de' => 'Insurances 2 de',
                'description_fr' => 'Insurances 2 fr',
                'price_per_day' => 200,
                'id_insurance_companies' => 2,
                'id_camper_names' => 2,
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            2 => array(
                'id' => 3,
                'description_en' => 'Insurances 3 en',
                'description_de' => 'Insurances 3 de',
                'description_fr' => 'Insurances 3 fr',
                'price_per_day' => 300,
                'id_insurance_companies' => 3,
                'id_camper_names' => 3,
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
        ));
    }
}
