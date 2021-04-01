<?php

use Faker\Generator as Faker;

$factory->define(App\Facility::class, function (Faker $faker) {
    return [
        'name' => $faker->word(),
				'type' => $faker->sentence(),
				'description' => $faker->sentence(),
				
    ];
});
