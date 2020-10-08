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
                'label_en' => 'Camper Category 1 en',
                'label_de' => 'Camper Category 1 de',
                'label_fr' => 'Camper Category 1 fr',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            1 => array(
                'id' => 2,
                'label_en' => 'Camper Category 2 en',
                'label_de' => 'Camper Category 2 de',
                'label_fr' => 'Camper Category 2 fr',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            2 => array(
                'id' => 3,
                'label_en' => 'Camper Category 3 en',
                'label_de' => 'Camper Category 3 de',
                'label_fr' => 'Camper Category 3 fr',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
        ));
    }
}
