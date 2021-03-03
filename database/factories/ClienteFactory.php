<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cliente;
use Faker\Generator as Faker;

$factory->define(Cliente::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'direccion' => $faker->city,
        'email' => $faker->safeEmail,
        'telefono' => $faker->numberBetween($min = 910273446, $max = 990273446),
        'precio' => $faker->numberBetween($min = 30, $max = 100),
        'latitud' => $faker->latitude($min = -17, $max = -16),
        'longitud' => $faker->longitude($min = -73, $max = -72),

    ];
});
