<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert(array(
            0 => array(
                'id' => 1,
                'full_name' => 'Full name 1',
                'email' => 'contact1@email.com',
                'telephone' => '+212 6 11 11 11 11',
                'subject' => 'first subject',
                'message' => 'my long message 1',
                'status' => '0',
                'send_date' => '2020-10-08 10:10:10',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            1 => array(
                'id' => 2,
                'full_name' => 'Full name 2',
                'email' => 'contact2@email.com',
                'telephone' => '+212 6 22 22 22 22',
                'subject' => 'second subject',
                'message' => 'my long message 2',
                'status' => '0',
                'send_date' => '2020-10-08 10:10:10',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            2 => array(
                'id' => 3,
                'full_name' => 'Full name 3',
                'email' => 'contact3@email.com',
                'telephone' => '+212 6 33 33 33 33',
                'subject' => 'third subject',
                'message' => 'my long message 3',
                'status' => '0',
                'send_date' => '2020-10-08 10:10:10',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
        ));
    }
}
