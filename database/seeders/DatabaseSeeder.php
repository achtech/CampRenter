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
            $this->call('UserSeeder');
            $this->call('AvatarSeeder');
            $this->call('CamperCategorySeeder');
            $this->call('CamperNameSeeder');
            $this->call('CamperStatusSeeder');
            $this->call('FuelSeeder');
            $this->call('LicenceCategorySeeder');
            $this->call('TransmissionSeeder');
            $this->call('ClientSeeder');
            $this->command->info('User table seeded!');
    }
}
