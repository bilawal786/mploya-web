<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'employer',
                'email' => 'employer@gmail.com',
                'user_type' => 'employer',
                'company_name' => 'y4ktech',
                'profile_status' => 'visible',
                'address' => 'lahore,pakistan',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Job Seeker',
                'email' => 'jobseeker@gmail.com',
                'user_type' => 'jobseeker',
                'profile_status' => 'visible',
                'address' => 'lahore,pakistan',
                'company_name' => '0',
                'password' => Hash::make('password'),
            ],
        ]);
    }
}
