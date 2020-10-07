<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class CamperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campers')->insert(array(
            0 => array(
                'image' => 'test.jbg',
                'brand' => '1',
                'value_of_vehicule' => '6000',
                'license_plate_number' => '141214',
                'seat_number' => '4',
                'sleeping_places' => '4',
                'vehicle_licence' => '10210',
                'length' => '10',
                'width' => '3',
                'height' => '2.5',
                'description_camper' => 'test description camper',
                'location' => 'location',
                'price_per_day' => '120',
                'minimal_rent_days' => '2',
                'included_kilometres' => '26000',
                'minimum_age' => '5',
                'animals_allowed' => 'No',
                'animal_description' => 'animal',
                'licence_needed_desc' => 'licence description',
                'license_age' => 'licence age',
                'licence_age_desc' => 'test age description',
                'smoking_allowed' => 'no',
                'availability' => '1',
                'is_confirmed' => '1',
                'id_clients' => '1',
                'id_camper_names' => '1',
                'id_licence_categories' => '1',
                'id_camper_categories' => '1',
                'id_transmissions' => '1',
                'id_fuels' => '1',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),

        ));
    }
}
