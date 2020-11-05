<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class CamperCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('camper_categories')->insert(array(
            0 => array(
                'id' => 1,
                'label_en' => 'motorhome',
                'label_de' => 'Wohnmobil',
                'label_fr' => 'Véhicules de camping',
                'image' => 'Wohnmobil-1.png',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            1 => array(
                'id' => 2,
                'label_en' => 'Campervan',
                'label_de' => 'Campingbus',
                'label_fr' => 'Van aménagé',
                'image' => 'Campingbus-1.png',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            2 => array(
                'id' => 3,
                'label_en' => 'Caravan',
                'label_de' => 'Wohnwagen ',
                'label_fr' => 'Caravane',
                'image' => 'Wohnwagen-1.png',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            3 => array(
                'id' => 4,
                'label_en' => 'Other',
                'label_de' => 'Sonstiges',
                'label_fr' => 'Autre',
                'image' => 'Sonstiges-1.png',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
        ));
    }
}
