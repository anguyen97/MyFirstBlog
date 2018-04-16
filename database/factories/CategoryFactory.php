<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWords = 4, $variableNbWords = true),
        'parent_id'=> 0,
        'description' => $faker->text($maxNbChars = 200),
        'slug' =>  str_slug($faker->sentence($nbWords = 4, $variableNbWords = true)),
    ];
});
