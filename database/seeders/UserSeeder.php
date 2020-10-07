<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(array(
            0 => array(
                'name' => 'admin',
                'email' => 'admin@mail.com',
                'password' => bcrypt('123456789'),
                'telephone' => '10210',
                'adress' => 'image',
                'picture' => '1',
                'role' => 'admin',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            1 => array(
                'name' => 'admin_s',
                'email' => 'admin_s@mail.com',
                'password' => bcrypt('123456789'),
                'telephone' => '10210',
                'adress' => 'image',
                'picture' => '1',
                'role' => 'super-admin',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),

        ));
    }
}
