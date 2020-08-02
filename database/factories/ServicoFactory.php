<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin\Servico;
use Faker\Generator as Faker;

$factory->define(Servico::class, function (Faker $faker) {

    return [
        'pet_id' => $faker->randomDigitNotNull,
        'tipo' => $faker->word,
        'obs' => $faker->text,
        'preco' => $faker->word
    ];
});
