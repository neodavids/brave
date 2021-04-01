<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
				$this->call(BookingsTableSeeder::class);
				$this->call(IssuesTableSeeder::class);
				$this->call(ShootsTableSeeder::class);
				$this->call(DocsTableSeeder::class);
				$this->call(ShowsTableSeeder::class);
				$this->call(MessagesTableSeeder::class);
				$this->call(DepartmentsTableSeeder::class);
				$this->call(FacilitiesTableSeeder::class);
				
    }
}
