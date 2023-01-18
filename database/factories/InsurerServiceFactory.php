<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
// use Faker\Generator as Faker;


// $factory->define(App\InsurerService::class, function (Faker $faker) {
   

class InsurerServiceFactory extends Factory
{
    
    public function definition()
    {

    return [
        'insurer_id' => $this->faker->numberBetween(1, 5),
        'description' => $this->faker->randomElement(array('Choque', 'Arrastre', 'Descompuerto')),
        'brand' => $this->faker->company,
        'type' => $this->faker->company,
        'model' => $this->faker->year,
        'category' => $this->faker->numberBetween(1, 3),
        'load' => $this->faker->numberBetween(100, 300),
        'plate' => $this->faker->regexify('[A-Z]{2}\-[A-Z][0-9]\-[0-9]{2}'),
        'color' => $this->faker->safeColorName,
        'user' => $this->faker->name,
        'origin' => $this->faker->city,
        'destination' => $this->faker->city,
        'driver_id' => $this->faker->numberBetween(1, 5),
        'unit_id' => 1,
        'booth' => $this->faker->name,
        'date_return' => date('Y-m-d H:i:s'),
        'date_assignment' =>  date('Y-m-d H:i:s'),
        'amount' => $this->faker->numberBetween(100, 600),
        'maneuver' => 0,
        'pension' => 0,
        'file' => $this->faker->numberBetween(1, 500),
        'folio' => $this->faker->numberBetween(1, 500),
    ];

    }   

}

