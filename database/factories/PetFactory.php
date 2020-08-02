<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin\Pet;
use Faker\Generator as Faker;

$factory->define(Pet::class, function (Faker $faker) {

    return [
        'cliente_id' => $faker->randomDigitNotNull,
        'nome' => $faker->word,
        'raca' => $faker->word,
        'sexo' => $faker->word,
        'castrado' => $faker->word,
        'porte' => $faker->word,
        'obs' => $faker->text,
        'img' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
