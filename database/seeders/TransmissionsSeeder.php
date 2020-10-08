<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class TransmissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transmissions')->insert(array(
            0 => array(
                'id' => '1',
                'label_en' => 'transmission 1 en',
                'label_de' => 'transmission 1 de',
                'label_fr' => 'transmission 1 fr',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            1 => array(
                'id' => '2',
                'label_en' => 'transmission 2 en',
                'label_de' => 'transmission 2 de',
                'label_fr' => 'transmission 2 fr',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            2 => array(
                'id' => '3',
                'label_en' => 'transmission 3 en',
                'label_de' => 'transmission 3 de',
                'label_fr' => 'transmission 3 fr',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
        ));
    }
}
