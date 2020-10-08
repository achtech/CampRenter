<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class CampersSeeder extends Seeder
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
                'id' => '1',
                'image' => 'camp1.jpg',
                'brand' => 'brand 1',
                'model' => 'model 1',
                'value_of_vehicule' => '1000',
                'license_plate_number' => 'Plat 1',
                'seat_number' => '4',
                'sleeping_places' => '4',
                'vehicle_licence' => '2018',
                'length' => '10',
                'width' => '11',
                'height' => '12',
                'description_camper' => 'description camper 1',
                'location' => 'location 1',
                'price_per_day' => '120',
                'minimal_rent_days' => '2',
                'included_kilometres' => '10000',
                'minimum_age' => '5',
                'animals_allowed' => 'No',
                'animal_description' => 'animal description 1',
                'licence_needed_desc' => 'licence needed description 1',
                'licence_needed' => 'licence needed 1',
                'license_age' => 'licence age 1',
                'licence_age_desc' => 'licence age description 1',
                'smoking_allowed' => 'no',
                'availability' => '1',
                'is_confirmed' => '1',
                'zip_code' => '1',
                'city' => 'Marrakech',
                'country' => 'Morocco',
                'position_x' => '31.624673',
                'position_y' => '-8.003592',
                'id_clients' => '1',
                'id_camper_names' => '1',
                'id_licence_categories' => '1',
                'id_camper_categories' => '1',
                'id_transmissions' => '1',
                'id_fuels' => '1',
                'id_camper_status' => '1',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            1 => array(
                'id' => '2',
                'image' => 'camp2.jpg',
                'brand' => 'brand 2',
                'model' => 'model 2',
                'value_of_vehicule' => '2000',
                'license_plate_number' => 'Plat 2',
                'seat_number' => '4',
                'sleeping_places' => '4',
                'vehicle_licence' => '2013',
                'length' => '20',
                'width' => '21',
                'height' => '22',
                'description_camper' => 'description camper 2',
                'location' => 'location 2',
                'price_per_day' => '220',
                'minimal_rent_days' => '3',
                'included_kilometres' => '20000',
                'minimum_age' => '5',
                'animals_allowed' => 'yES',
                'animal_description' => 'animal description 2',
                'licence_needed_desc' => 'licence needed description 2',
                'licence_needed' => 'licence needed 2',
                'license_age' => 'licence age 2',
                'licence_age_desc' => 'licence age description 2',
                'smoking_allowed' => 'no',
                'availability' => '0',
                'is_confirmed' => '0',
                'zip_code' => '130000',
                'city' => 'Rabat',
                'country' => 'Morocco',
                'position_x' => '34.023138',
                'position_y' => '-6.835734',
                'id_clients' => '2',
                'id_camper_names' => '2',
                'id_licence_categories' => '2',
                'id_camper_categories' => '2',
                'id_transmissions' => '2',
                'id_fuels' => '2',
                'id_camper_status' => '2',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
        ));
    }
}
