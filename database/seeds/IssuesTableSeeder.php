<?php

use Illuminate\Database\Seeder;

class IssuesTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        App\Issue::unsetEventDispatcher();
        factory('App\Issue',50)->create();
    }
}
