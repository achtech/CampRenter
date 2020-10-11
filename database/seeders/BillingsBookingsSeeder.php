<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;
class BillingsBookingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('billing_bookings')->insert(array(
            0 => array(
                'id' => 1,
                'id_billings' => '1',
                'id_bookings' => '3',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            1 => array(
                'id' => 2,
                'id_billings' => '2',
                'id_bookings' => '1',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            2 => array(
                'id' => 3,
                'id_billings' => '3',
                'id_bookings' => '2',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
        ));
    }
}
