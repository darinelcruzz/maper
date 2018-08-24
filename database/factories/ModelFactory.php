<?php
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => 'Lab3',
        'email' => 'admin',
        'level' => '1',
        'password' => Hash::make('helefante'),
        'pass' => 'helefante',
        'user' => '1',
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Unit::class, function (Faker\Generator $faker) {

    return [
        'number' => '1',
        'name' => 'Plataforma',
        'description' => '01 Plataforma',
    ];
});

$factory->define(App\Client::class, function (Faker\Generator $faker) {

    return [
        'name' => 'Publico en General',
        'city' => 'n/a',
        'phone' => '0',
    ];
});

$factory->define(App\Price::class, function (Faker\Generator $faker) {

    return [
        'name' => 'Pensión',
        'type' => 'otros',
        'km' => null,
        'moto' => '25',
        'car' => '60',
        'ton3' => '150',
        'ton5' => '150',
        'ton10' => '150',
    ];
});

$factory->define(App\Driver::class, function (Faker\Generator $faker) {
    $time = $faker->time('H:i', '10:00 am');

    return [
        'name' => $faker->firstNameMale,
        'start_hour' => $time,
        'end_hour' => date('H:i', strtotime("$time + 10 hours")),
        'type' => 'operador',
        'base_salary' => $faker->numberBetween(0, 800),
    ];
});

$factory->define(App\Price::class, function (Faker\Generator $faker) {
    $types = ['otros', 'localG', 'localC', 'Ruta 1', 'Ruta 2', 'Ruta 3', 'Ruta 4', 'Ruta 5'];

    return [
        'name' => $faker->state . ' - ' . $faker->state,
        'type' => $types[array_rand($types)],
        'km' => $faker->numberBetween(10, 50),
        'moto' => $faker->numberBetween(50, 100),
        'car' => $faker->numberBetween(100, 250),
        'ton3' => $faker->numberBetween(150, 300),
        'ton5' => $faker->numberBetween(280, 450),
        'ton10' => $faker->numberBetween(500, 800),
        'observation' => $faker->sentence,
    ];
});
