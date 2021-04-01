<?php

use Illuminate\Database\Seeder;

class DocsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        App\Doc::unsetEventDispatcher();
        factory('App\Doc',50)->create();
    }
}
