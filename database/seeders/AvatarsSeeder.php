<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class AvatarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('avatars')->insert(array(
            0 => array(
                'id' => '1',
                'image' => 'avatar1.png',
                'label' => 'Default avatar',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            1 => array(
                'id' => '2',
                'image' => 'avatar2.jpg',
                'label' => 'Default avatar2',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            )
        ));
    }
}
