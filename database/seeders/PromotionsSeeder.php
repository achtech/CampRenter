<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class PromotionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promotions')->insert(array(
            0 => array(
                'id' => '1',
                'rate' => 10,
                'start_date' => '2020-09-01',
                'end_date' => '2020-09-15',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            1 => array(
                'id' => '2',
                'rate' => 15,
                'start_date' => '2020-10-01',
                'end_date' => '2020-10-15',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            2 => array(
                'id' => '3',
                'rate' => 20,
                'start_date' => '2020-11-01',
                'end_date' => '2020-11-15',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
        ));
    }
}
