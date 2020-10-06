<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class LicenceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('licence_categories')->insert(array(
            0 => array(
                'label_en' => 'LicenceCategory en',
                'label_de' => 'camLicenceCategoryper de',
                'label_fr' => 'LicenceCategory fr',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            1 => array(
                'label_en' => 'LicenceCategory2 en',
                'label_de' => 'LicenceCategory2 de',
                'label_fr' => 'LicenceCategory2 fr',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            2 => array(
                'label_en' => 'LicenceCategory3 en',
                'label_de' => 'LicenceCategory3 de',
                'label_fr' => 'LicenceCategory3 fr',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
        ));
    }
}
