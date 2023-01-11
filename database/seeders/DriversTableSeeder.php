<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DriversTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Driver::class, 5)->create();
    }
}
