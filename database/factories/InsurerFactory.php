<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InsurerFactory extends Factory
{
    
    public function definition()
    {
// $factory->define(App\Insurer::class, function (Faker $faker) {
//     $company = $faker->company;

    return [
        'name' => $this->faker->company,
        'business_name' => $this->faker->company . " " . $this->faker->companySuffix,
        'rfc' => $this->faker->swiftBicNumber,
        'address' => $this->faker->streetAddress,
        'phone' => $this->faker->tollFreePhoneNumber,
    ];

    }
}