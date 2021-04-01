<?php

use Faker\Generator as Faker;

$factory->define(App\Message::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
				'body' => $faker->sentence(),
				'sender' => $faker->sentence(),
				
    ];
});
