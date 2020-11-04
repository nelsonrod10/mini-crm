<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Empleado;
use App\Compania;
use Faker\Generator as Faker;

$factory->define(Empleado::class, function (Faker $faker) {
    return [
        'compania_id' => Compania::all(['id'])->random(1),
        'primer_nombre' => $faker->name(),
        'apellido' => $faker->lastName,
        'correo' => $faker->companyEmail,
        'telefono' => $faker->phoneNumber,
    ];
});
