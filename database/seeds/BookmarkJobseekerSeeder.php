<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookmarkJobseekerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employerbookmarks')->insert([
            [
                'employer_id' => 1,
                'jobseeker_id' => 5,
            ],
            [
                'employer_id' => 2,
                'jobseeker_id' => 5,
            ],

        ]);
    }
}
