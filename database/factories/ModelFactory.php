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

$factory->define(App\Driver::class, function (Faker\Generator $faker) {

    return [
        'name' => 'Deberlín',
    ];
});

$factory->define(App\Price::class, function (Faker\Generator $faker) {

    return [
        'name' => 'Automovil',
        'pension' => '60',
    ];
});

$factory->define(App\Service::class, function (Faker\Generator $faker) {
    $service = array('Público general', 'Tránsito del Estado');

    return [
        'service' => $service[array_rand($service)],
        'description' => 'Servicio',
        'brand' => 'Audi',
        'type' => 'A4',
        'category' => '1',
        'load' => '0',
        'plate' => 'CV-56-56',
        'color' => 'Gris',
        'inventory' => '001',
        'key' => 'si',
        'username' => 'Victor',
        'origin' => 'Margaritas',
        'destination' => 'Comitán',
        'driver' => '1',
        'unit' => '1',
        'date_service' => '2017-08-04 14:05:00',
        'date_out' => null,
        'date_return' => '2017-08-04 23:10:00',
        'amount' => '600',
        'status' => 'pagado',
        'lot'   => null,
    ];
});
