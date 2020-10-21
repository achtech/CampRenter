<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class ClientsSeeder extends Seeder
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
                'id' => '1',
                'client_name' => 'achraf',
                'client_last_name' => 'saloumi',
                'email' => 'achraf.saloumi@mail.com',
                'password' => bcrypt('123456789'),
                'national_id' => 'HA123456',
                'image_national_id' => 'default1.jpg',
                'driving_licence' => '10210',
                'driving_licence_image' => 'default2.png',
                'status' => '1',
                'id_avatars' => '1',
                'language' => 'EN / DE',
                'review' => 'I\'ve been renting out my California T4 on MyCamper since 2 years. Unfortunately I don\'t use it enough and maintenance is too expensive when I don\'t share it.   ',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),
            1 => array(
                'id' => '2',
                'client_name' => 'brahim',
                'client_last_name' => 'barjali',
                'email' => 'brahim.barjali@mail.com',
                'password' => bcrypt('123456789'),
                'national_id' => 'B112233',
                'image_national_id' => 'default1.jpg',
                'driving_licence' => '10210',
                'driving_licence_image' => 'default2.png',
                'status' => '0',
                'id_avatars' => '2',
                'language' => 'EN / FR',
                'review' => 'We had very good experiences with our hirers. Usually the car is returned cleaner than when we handed it over. With our 6 rentals last year we made approx. 4000-5000 CHF.',
                'created_by' => 1,
                'created_at' => date("Y-m-d h:i:s"),
                'updated_by' => 1,
                'updated_at' => date("Y-m-d h:i:s"),
            ),

        ));
    }
}
