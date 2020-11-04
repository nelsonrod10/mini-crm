<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Compania;
use Faker\Generator as Faker;

$factory->define(Compania::class, function (Faker $faker) {
    return [
        'nombre'=> $faker->company,
        'correo'=> $faker->companyEmail,
        'logo'=> $faker->imageUrl(100, 100),
        'pagina_web'=> $faker->url
    ];
});
