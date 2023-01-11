<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InsurerServicesTableSeeder extends Seeder
{
    function run()
    {
        factory(App\InsurerService::class, 5)->create();
    }
}
