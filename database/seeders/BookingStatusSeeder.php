<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class BookingStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('booking_status')->insert(array(
            0 => array(
                'id' => 1,
                'label_en' => 'Open',
                'label_de' => 'Booking Status 2 de',
                'label_fr' => 'Booking Status 3 fr',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            1 => array(
                'id' => 2,
                'label_en' => 'In progress',
                'label_de' => 'Booking Status 2 de',
                'label_fr' => 'Booking Status 2 fr',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            2 => array(
                'id' => 3,
                'label_en' => 'Closed',
                'label_de' => 'Booking Status 3 de',
                'label_fr' => 'Booking Status 3 fr',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
        ));
        //
    }
}
