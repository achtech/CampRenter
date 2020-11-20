<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class CamperSubCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('camper_sub_categories')->insert(array(
            0 => array(
                'id' => 1,
                'id_camper_categories' => 2,
                'label_en' => 'Profile',
                'label_de' => 'Profile',
                'label_fr' => 'Profile',
                'image' => 'Profile.png',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            1 => array(
                'id' => 2,
                'id_camper_categories' => 4,
                'label_en' => 'Integrale',
                'label_de' => 'Integrale ',
                'label_fr' => 'Integrale',
                'image' => 'Integrale.png',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            2 => array(
                'id' => 3,
                'id_camper_categories' => 4,
                'label_en' => 'Other 1',
                'label_de' => 'Sonstiges 1',
                'label_fr' => 'Autre 1',
                'image' => 'Other 1.png',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            3 => array(
                'id' => 4,
                'id_camper_categories' => 4,
                'label_en' => 'Other 2',
                'label_de' => 'Sonstiges 2',
                'label_fr' => 'Autre 2',
                'image' => 'Other 2.png',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
        ));
    }
}
