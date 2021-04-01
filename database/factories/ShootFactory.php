<?php

use Faker\Generator as Faker;

$factory->define(App\Shoot::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
				'start_date' => $faker->sentence(),
				'end_date' => $faker->sentence(),
				'status' => $faker->sentence(),
				'producer_1' => $faker->sentence(),
				'producer_2' => $faker->sentence(),
				'producer_3' => $faker->sentence(),
				'producer_4' => $faker->sentence(),
				'description' => $faker->sentence(),
				
    ];
});
