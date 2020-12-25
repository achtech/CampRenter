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
                'label_en' => 'Requested',
                'label_de' => 'Angefordert',
                'label_fr' => 'Demandé',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            1 => array(
                'id' => 2,
                'label_en' => 'Confirmed',
                'label_de' => 'Confirmed',
                'label_fr' => 'Confirmed',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            2 => array(
                'id' => 3,
                'label_en' => 'Denied',
                'label_de' => 'Denied',
                'label_fr' => 'Denied',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            3 => array(
                'id' => 4,
                'label_en' => 'Paid',
                'label_de' => 'Paid',
                'label_fr' => 'Paid',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            4 => array(
                'id' => 5,
                'label_en' => 'In progress',
                'label_de' => 'In progress',
                'label_fr' => 'In progress',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            5 => array(
                'id' => 6,
                'label_en' => 'Closed',
                'label_de' => 'Closed',
                'label_fr' => 'Closed',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            6 => array(
                'id' => 7,
                'label_en' => 'Blocked',
                'label_de' => 'Bloqué',
                'label_fr' => 'Verstopft',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
        ));
    }
}
