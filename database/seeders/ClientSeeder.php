<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert(array(
            0 => array(
                'client_name' => 'test.jbg',
                'client_last_name' => '1',
                'email' => '6000',
                'password' => '141214',
                'national_id' => '411111',
                'image_national_id' => '41111',
                'driving_licence' => '10210',
                'driving_licence_image' => 'image',
                'status' => '1',
                'id_avatars' => '1',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),

        ));
    }
}
