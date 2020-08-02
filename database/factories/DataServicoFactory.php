<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\DataServico;
use Faker\Generator as Faker;

$factory->define(DataServico::class, function (Faker $faker) {

    return [
        'data_servico' => $faker->word,
        'horario' => $faker->word,
        'data_servico_ts' => $faker->date('Y-m-d H:i:s')
    ];
});
