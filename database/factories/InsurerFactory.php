<?php

use Faker\Generator as Faker;

$factory->define(App\Insurer::class, function (Faker $faker) {
    $company = $faker->company;

    return [
        'name' => $company,
        'business_name' => $company . " " . $faker->companySuffix,
        'rfc' => $faker->swiftBicNumber,
        'address' => $faker->streetAddress,
        'phone' => $faker->tollFreePhoneNumber
    ];
});
