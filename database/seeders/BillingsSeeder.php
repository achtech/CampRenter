<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class BillingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('billings')->insert(array(
            0 => array(
                'id' => 1,
                'iban' => '12421 12412 412411 121515',
                'billings_methods' => 'Method 1',
                'total' => '1201',
                'id_clients' => '2',
                'id_bookings' => '1',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            1 => array(
                'id' => 2,
                'iban' => '12421 12412 412411 121515',
                'billings_methods' => 'Method 2',
                'total' => '1201',
                'id_clients ' => '1',
                'id_bookings ' => '2',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            2 => array(
                'id' => 3,
                'iban' => '12421 12412 412411 121515',
                'billings_methods' => 'Method 3',
                'total' => '400',
                'id_clients ' => '1',
                'id_bookings ' => '3',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
        ));
    }
}
