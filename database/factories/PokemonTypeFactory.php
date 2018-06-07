<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Models\PokemonType::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
