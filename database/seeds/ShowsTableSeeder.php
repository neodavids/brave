<?php

use Illuminate\Database\Seeder;

class ShowsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        App\Show::unsetEventDispatcher();
        factory('App\Show',50)->create();
    }
}
