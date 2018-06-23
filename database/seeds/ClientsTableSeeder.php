<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    function run()
    {
        factory(App\Client::class, 1)->create();
    }
}
