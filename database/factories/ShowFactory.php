<?php

use Faker\Generator as Faker;

$factory->define(App\Show::class, function (Faker $faker) {
    return [
        'user' => $faker->sentence(),
				'date' => $faker->sentence(),
				'show_description' => $faker->sentence(),
				'studio' => $faker->sentence(),
				'start_time' => $faker->sentence(),
				'end_time' => $faker->sentence(),
				
    ];
});
