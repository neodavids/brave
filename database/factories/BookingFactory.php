<?php

use Faker\Generator as Faker;

$factory->define(App\Booking::class, function (Faker $faker) {
    return [
        'user' => $faker->sentence(),
				'date' => $faker->sentence(),
				'start_time' => $faker->sentence(),
				'end_time' => $faker->sentence(),
				'meeting_description' => $faker->sentence(),
				'facility' => $faker->sentence(),
				
    ];
});
