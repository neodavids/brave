<?php

use Faker\Generator as Faker;

$factory->define(App\Department::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
				'head_of_department' => $faker->sentence(),
				
    ];
});
