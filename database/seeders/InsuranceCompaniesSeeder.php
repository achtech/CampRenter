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
                'label_en' => 'Insurance company 1',
                'label_de' => 'Insurance company 1',
                'label_fr' => 'Insurance company 1',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            1 => array(
                'id' => 2,
                'label_en' => 'Insurance company 2',
                'label_de' => 'Insurance company 2',
                'label_fr' => 'Insurance company 2',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            2 => array(
                'id' => 3,
                'label_en' => 'Insurance company 3',
                'label_de' => 'Insurance company 3',
                'label_fr' => 'Insurance company 3',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
        ));
    }
}
