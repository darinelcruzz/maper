<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(UnitsTableSeeder::class);
        $this->call(DriversTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(PricesTableSeeder::class);
        $this->call(InsurersTableSeeder::class);
        $this->call(InsurerServicesTableSeeder::class);
    }
}
