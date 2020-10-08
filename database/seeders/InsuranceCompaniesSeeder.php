<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class InsuranceCompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('insurance_companies')->insert(array(
            0 => array(
                'id' => 1,
                'label_en' => 'Insurance companies 1 en',
                'label_de' => 'Insurance companies 1 de',
                'label_fr' => 'Insurance companies 1 fr',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            1 => array(
                'id' => 2,
                'label_en' => 'Insurance companies 2 en',
                'label_de' => 'Insurance companies 2 de',
                'label_fr' => 'Insurance companies 2 fr',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            2 => array(
                'id' => 3,
                'label_en' => 'Insurance companies 3 en',
                'label_de' => 'Insurance companies 3 de',
                'label_fr' => 'Insurance companies 3 fr',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
        ));
    }
}
