<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Manager;
use Faker\Generator as Faker;

$factory->define(Manager::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt('111111')
    ];
});
