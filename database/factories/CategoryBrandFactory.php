<?php

use Faker\Generator as Faker;

$factory->define(App\Brand::class, function (Faker $faker) {
    return [
        'brand_name' => $faker->sentence(1)
    ];
});

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'category_name' => $faker->sentence(1)
    ];
});
