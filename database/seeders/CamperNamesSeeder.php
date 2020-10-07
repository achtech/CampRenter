<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class CamperNamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('camper_names')->insert(array(
            0 => array(
                'label_en' => 'camper en',
                'label_de' => 'camper de',
                'label_fr' => 'camper fr',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            1 => array(
                'label_en' => 'camper2 en',
                'label_de' => 'camper2 de',
                'label_fr' => 'camper2 fr',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            2 => array(
                'label_en' => 'camper3 en',
                'label_de' => 'camper3 de',
                'label_fr' => 'camper3 fr',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
        ));
        //
    }
}
