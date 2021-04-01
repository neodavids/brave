<?php

use Faker\Generator as Faker;

$factory->define(App\Doc::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
				'download_link' => $faker->sentence(),
				'last_updated' => $faker->sentence(),
				
    ];
});
