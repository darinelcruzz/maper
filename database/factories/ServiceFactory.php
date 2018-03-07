<?php

use Faker\Generator as Faker;

$factory->define(App\Service::class, function (Faker $faker) {
    return [
        'description' => $faker->randomElement(array('Servicio', 'Arrastre', 'Cola')),
        'maneuver' => $faker->numberBetween(100, 200),
        'amount' => $faker->numberBetween(100, 600),
        'brand' => $faker->company,
        'type' => $faker->company,
        'model' => $faker->year,
        'category' => $faker->randomElement(array('1', '2', '3')),
        'load' => $faker->numberBetween(100, 300),
        'plate' => $faker->regexify('[A-Z]{2}\-[A-Z][0-9]\-[0-9]{2}'),
        'color' => $faker->safeColorName,
        'origin' => $faker->city,
        'destination' => $faker->city,
        'driver_id' => $faker->randomElement(array('1', '2', '3', '4', '5')),
        'unit_id' => 1,
        'pay' => 'credito',
    ];
});
