<?php

use Illuminate\Database\Seeder;

class BookingsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        App\Booking::unsetEventDispatcher();
        factory('App\Booking',50)->create();
    }
}
