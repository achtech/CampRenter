<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            AvatarsSeeder::class,
            CamperNamesSeeder::class,

            CamperStatusSeeder::class,
            CamperCategoriesSeeder::class,
            CommissionsSeeder::class,

            FuelsSeeder::class,
            InsuranceCompaniesSeeder::class,
            LicenceCategoriesSeeder::class,

            MessagesSeeder::class,
            PromotionsSeeder::class,
            TransmissionsSeeder::class,

            ClientsSeeder::class,
            InsurancesSeeder::class,
            CampersSeeder::class,

            CamperImagesSeeder::class,
            BookingsSeeder::class,
            ChatsSeeder::class,
            BillingsSeeder::class,

        ]);

    }
}
