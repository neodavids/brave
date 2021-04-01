<?php

use Illuminate\Database\Seeder;

class FacilitiesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        App\Facility::unsetEventDispatcher();
        factory('App\Facility',50)->create();
    }
}
