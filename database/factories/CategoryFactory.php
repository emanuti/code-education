<?php

use Faker\Generator as Faker;

$factory->define(CodeEducation\Category::class, function(Faker $faker) {
    return [
        'name' => $faker->word(),
        'description' => $faker->sentence()
    ];
});