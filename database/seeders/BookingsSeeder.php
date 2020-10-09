<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class BookingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bookings')->insert(array(
            0 => array(
                'id' => 1,
                'start_date' => date("Y-m-d h:i:s"),
                'end_date' => date("Y-m-d h:i:s"),
                'total' => 4500,
                'price_per_day' => 120,
                'status_billings' => 'Not Payed',
                'commission' => 10,
                'id_campers' => 1,
                'id_clients' => 1,
                'id_booking_status' => 1,
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            1 => array(
                'id' => 2,
                'start_date' => date("Y-m-d h:i:s"),
                'end_date' => date("Y-m-d h:i:s"),
                'total' => 4000,
                'price_per_day' => 20,
                'status_billings' => 'Payed',
                'commission' => 30,
                'id_campers' => 2,
                'id_clients' => 2,
                'id_booking_status' => 3,
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            2 => array(
                'id' => 3,
                'start_date' => date("Y-m-d h:i:s"),
                'end_date' => date("Y-m-d h:i:s"),
                'total' => 5000,
                'price_per_day' => 200,
                'status_billings' => 'Payed',
                'commission' => 15,
                'id_campers' => 2,
                'id_clients' => 2,
                'id_booking_status' => 2,
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
        ));
    }
}
