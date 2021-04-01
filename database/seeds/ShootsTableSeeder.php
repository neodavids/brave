<?php

use Illuminate\Database\Seeder;

class ShootsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        App\Shoot::unsetEventDispatcher();
        factory('App\Shoot',50)->create();
    }
}
