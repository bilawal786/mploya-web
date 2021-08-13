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
        $this->call(SubscriptionSeeder::class);
        $this->call(ActiveSunscriptionSeeder::class);
        $this->call(SubcategorySeeder::class);
        $this->call(BookmarkJobSeeder::class);
        $this->call(AppliedJobSeeder::class);
        $this->call(AppliedUserJobSeeder::class);
    }
}
