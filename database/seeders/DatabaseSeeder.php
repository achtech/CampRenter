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

            BookingStatusSeeder::class,
            CamperCategoriesSeeder::class,

            FuelsSeeder::class,
            InsuranceCompaniesSeeder::class,
            LicenceCategoriesSeeder::class,

            MessagesSeeder::class,
            PromotionsSeeder::class,
            TransmissionsSeeder::class,

            ClientsSeeder::class,
            InsurancesSeeder::class,
            CamperSubCategoriesSeeder::class,
            CampersSeeder::class,

            CamperImagesSeeder::class,
            BookingsSeeder::class,
            ChatsSeeder::class,
            BillingsSeeder::class,
            BillingsBookingsSeeder::class,
            BlogSeeder::class,
            CamperReviewsSeeder::class,
            BlogCommentSeeder::class,
            camperTermsSeeder::class,
        ]);

    }
}
