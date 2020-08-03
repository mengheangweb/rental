<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Unit;
use Faker\Generator as Faker;

$factory->define(Unit::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'size' => $faker->randomElement(['s','m','l']),
        'price' => $faker->randomFloat(2,100, 10000)
    ];
});
