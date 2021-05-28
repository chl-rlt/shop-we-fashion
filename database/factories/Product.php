<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'description' => $faker->paragraph(),
        'price' => $faker->randomFloat(2, 9.99, 999.99),
        'reference' => $faker->regexify('[A-Za-z0-9]{16}'),
    ];
});
