<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Admin\Cliente;
use Faker\Generator as Faker;

$factory->define(Cliente::class, function (Faker $faker) {

    return [
        'nome' => $faker->word,
        'fone' => $faker->word,
        'email' => $faker->word,
        'obs' => $faker->text,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
