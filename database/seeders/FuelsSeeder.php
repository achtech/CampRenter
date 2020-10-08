<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class FuelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fuels')->insert(array(
            0 => array(
                'id' => 1,
                'label_en' => 'Fuel 1 en',
                'label_de' => 'Fuel 1 de',
                'label_fr' => 'Fuel 1 fr',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            1 => array(
                'id' => 2,
                'label_en' => 'Fuel 2 en',
                'label_de' => 'Fuel 2 de',
                'label_fr' => 'Fuel 2 fr',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            2 => array(
                'id' => 3,
                'label_en' => 'Fuel 3 en',
                'label_de' => 'Fuel 3 de',
                'label_fr' => 'Fuel 3 fr',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
        ));
    }
}
