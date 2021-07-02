<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Prouduct;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

$factory->define(Prouduct::class, function (Faker $faker) {
    $productSuffixes = ['Sweater', 'Pants', 'Shairt', 'Glassess', 'Hat', 'Socks'];
    $name = $faker->company.' '. Arr::random($productSuffixes);
    return [
        'name' => $name,
        'slug' => Str::slug($name),
        'description' => $faker->realText(25),
        'price' => $faker->numberBetween(1000, 10000),
    ];
});
