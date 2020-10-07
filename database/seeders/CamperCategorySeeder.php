<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class CamperCategorySeeder extends Seeder
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
                'label_en' => 'CamperCategory en',
                'label_de' => 'CamperCategory de',
                'label_fr' => 'CamperCategory fr',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            1 => array(
                'label_en' => 'CamperCategory2 en',
                'label_de' => 'CamperCategory2 de',
                'label_fr' => 'CamperCategory2 fr',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            2 => array(
                'label_en' => 'CamperCategory3 en',
                'label_de' => 'CamperCategory3 de',
                'label_fr' => 'CamperCategory3 fr',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
        ));
    }
}
