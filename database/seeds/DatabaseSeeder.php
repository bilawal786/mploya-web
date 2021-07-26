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
        $this->call(CreateUsersSeeder::class);
        $this->call(CreateAdminSeeder::class);
        $this->call(JobSeeder::class);
        $this->call(CategorySeeder::class);
    }
}
