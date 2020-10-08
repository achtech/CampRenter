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
                'message' => 'Hi there! How are you',
                'date_sent' => date("Y-m-d h:i:s"),
                'ordre_message' => 1,
                'id_owners' => '2',
                'id_renters' => '1',
                'id_bookings' => '1',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            1 => array(
                'id' => 2,
                'message' => 'Hello again',
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
                'message' => 'Hello there!',
                'date_sent' => date("Y-m-d h:i:s"),
                'ordre_message' => 3,
                'id_owners' => '2',
                'id_renters' => '1',
                'id_bookings' => '1',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
        ));
    }
}
