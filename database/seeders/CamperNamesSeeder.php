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
                'id' => 1,
                'label_en' => 'camper 1 en',
                'label_de' => 'camper 1 de',
                'label_fr' => 'camper 1 fr',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            1 => array(
                'id' => 2,
                'label_en' => 'camper 2 en',
                'label_de' => 'camper 2 de',
                'label_fr' => 'camper 2 fr',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            2 => array(
                'id' => 3,
                'label_en' => 'camper 3 en',
                'label_de' => 'camper 3 de',
                'label_fr' => 'camper 3 fr',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
        ));
        //
    }
}
