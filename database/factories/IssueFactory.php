<?php

use Faker\Generator as Faker;

$factory->define(App\Issue::class, function (Faker $faker) {
    return [
        'item_name' => $faker->sentence(),
				'description' => $faker->sentence(),
				'date' => $faker->sentence(),
				'location' => $faker->sentence(),
				'raised_by' => $faker->sentence(),
				'department' => $faker->sentence(),
				'status' => $faker->sentence(),
				'solved_by' => $faker->sentence(),
				'action_taken' => $faker->sentence(),
				'cause_of_breakdown' => $faker->sentence(),
				'engineers_comment' => $faker->sentence(),
				
    ];
});
