<?php

use Faker\Generator as Faker;

$factory->define(CodeEducation\Product::class, function (Faker $faker) {
    return [
        'category_id' => $faker->numberBetween(1,15),
        'name' => $faker->word,
        'description' => $faker->sentence,
        'price' => $faker->randomNumber(2),
        'featured' => $faker->word,
        'recommended' => $faker->sentence,
    ];
});
