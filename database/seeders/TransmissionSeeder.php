<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class TransmissionSeeder extends Seeder
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
                'label_en' => 'transmission en',
                'label_de' => 'transmission de',
                'label_fr' => 'transmission fr',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            1 => array(
                'label_en' => 'transmission2 en',
                'label_de' => 'transmission2 de',
                'label_fr' => 'transmission2 fr',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            2 => array(
                'label_en' => 'transmission3 en',
                'label_de' => 'transmission3 de',
                'label_fr' => 'transmission3 fr',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
        ));
    }
}
