<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Data1;
use Faker\Generator as Faker;

$factory->define(Data1::class, function (Faker $faker) {

    return [
        'data1' => $faker->date('Y-m-d H:i:s')
    ];
});
