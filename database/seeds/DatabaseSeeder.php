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
        $this->call([
            // CreateUsersSeeder::class,
            // CreateAdminSeeder::class,
            // JobSeeder::class,
            CategorySeeder::class,
            SubscriptionSeeder::class,
            // ActiveSunscriptionSeeder::class,
            SubcategorySeeder::class,
            // BookmarkJobSeeder::class,
            // AppliedJobSeeder::class,
            // AppliedUserJobSeeder::class,
            // BookmarkJobseekerSeeder::class,
            // NotificationSeeder::class,
            // ReviewSeeder::class,

        ]);
    }
}
