<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class CamperStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('camper_status')->insert(array(
            0 => array(
                'label_en' => 'CamperStatus en',
                'label_de' => 'CamperStatus de',
                'label_fr' => 'CamperStatus fr',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            1 => array(
                'label_en' => 'CamperStatus2 en',
                'label_de' => 'CamperStatus2 de',
                'label_fr' => 'CamperStatus2 fr',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            2 => array(
                'label_en' => 'CamperStatus3 en',
                'label_de' => 'CamperStatus3 de',
                'label_fr' => 'CamperStatus3 fr',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
        ));
        //
    }
}
