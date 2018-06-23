<?php

use Faker\Generator as Faker;

$factory->define(App\InsurerService::class, function (Faker $faker) {
    return [
        'insurer_id' => $faker->numberBetween(1, 5),
        'description' => $faker->randomElement(array('Choque', 'Arrastre', 'Descompuerto')),
        'brand' => $faker->company,
        'type' => $faker->company,
        'model' => $faker->year,
        'category' => $faker->numberBetween(1, 3),
        'load' => $faker->numberBetween(100, 300),
        'plate' => $faker->regexify('[A-Z]{2}\-[A-Z][0-9]\-[0-9]{2}'),
        'color' => $faker->safeColorName,
        'user' => $faker->name,
        'origin' => $faker->city,
        'destination' => $faker->city,
        'driver_id' => $faker->numberBetween(1, 5),
        'unit_id' => 1,
        'booth' => $faker->name,
        'date_return' => date('Y-m-d H:i:s'),
        'date_assignment' =>  date('Y-m-d H:i:s'),
        'amount' => $faker->numberBetween(100, 600),
        'maneuver' => 0,
        'pension' => 0,
        'file' => $faker->numberBetween(1, 500),
        'folio' => $faker->numberBetween(1, 500),
    ];
});
