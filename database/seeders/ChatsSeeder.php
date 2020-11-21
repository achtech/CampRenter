<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class ChatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chats')->insert(array(
            0 => array(
                'id' => 1,
                'message' => 'Hi Im achraf I wanna rent your camp',
                'date_sent' => date("Y-m-d h:i:s"),
                'ordre_message' => 1,
                'id_owners' => '1',
                'id_renters' => '2',
                'id_bookings' => '1',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            1 => array(
                'id' => 2,
                'message' => 'Hello , sure for how much days',
                'date_sent' => date("Y-m-d h:i:s"),
                'ordre_message' => 2,
                'id_owners' => '2',
                'id_renters' => '1',
                'id_bookings' => '1',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            2 => array(
                'id' => 3,
                'message' => 'its depend',
                'date_sent' => date("Y-m-d h:i:s"),
                'ordre_message' => 3,
                'id_owners' => '1',
                'id_renters' => '2',
                'id_bookings' => '1',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            3 => array(
                'id' => 4,
                'message' => 'Hi Im OUmaima , I wanna rent your campers',
                'date_sent' => date("Y-m-d h:i:s"),
                'ordre_message' => 1,
                'id_owners' => '3',
                'id_renters' => '2',
                'id_bookings' => '3',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            4 => array(
                'id' => 5,
                'message' => 'Hello nice , wich one ?',
                'date_sent' => date("Y-m-d h:i:s"),
                'ordre_message' => 2,
                'id_owners' => '2',
                'id_renters' => '3',
                'id_bookings' => '3',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            5 => array(
                'id' => 6,
                'message' => 'the best one',
                'date_sent' => date("Y-m-d h:i:s"),
                'ordre_message' => 3,
                'id_owners' => '3',
                'id_renters' => '2',
                'id_bookings' => '3',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
        ));
    }
}
