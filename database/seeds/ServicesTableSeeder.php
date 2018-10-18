<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $corps = array('Tránsito del Estado', 'Vialidad Municipal', 'Policia Municipal', 'Fiscalía', 'Federal');

        factory(App\Service::class, 5)->create([
            'service' => 'General',
            'client_id' => 1,
            'date_service' => date('Y-m-d H:i:s'),
            'date_return' => date('Y-m-d H:i:s'),
            'status' => 'pendiente'
        ]);

        for ($i=0; $i < 5; $i++) {
            factory(App\Service::class)->create([
                'service' => $corps[array_rand($corps)],
                'key' => 'si',
                'date_service' => date('Y-m-d H:i:s'),
                'date_return' => date('Y-m-d H:i:s'),
                'lot' => 'Cueva',
                'status' => 'corralon',
                'pay' => NULL
            ]);
        }
    }
}
