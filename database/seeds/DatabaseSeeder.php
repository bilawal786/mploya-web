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
            CategorySeeder::class,
            SubscriptionSeeder::class,
            SubcategorySeeder::class,
            CreateUsersSeeder::class,
            CreateAdminSeeder::class,
            JobSeeder::class,
            ActiveSunscriptionSeeder::class,
            BookmarkJobSeeder::class,
            AppliedJobSeeder::class,
            AppliedUserJobSeeder::class,
            BookmarkJobseekerSeeder::class,
            NotificationSeeder::class,
            ReviewSeeder::class,

        ]);
    }
}
