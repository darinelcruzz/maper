<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PricesTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Price::class, 50)->create();
    }
}
