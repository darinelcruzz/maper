<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InsurersTableSeeder extends Seeder
{
    public function run()
    {
        factory(App\Insurer::class, 5)->create();
    }
}
