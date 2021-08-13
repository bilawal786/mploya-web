<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookmarkJobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bookmarks')->insert([
            [
                'job_id' => 1,
                'jobseeker_id' => 2,
            ],
            [
                'job_id' => 2,
                'jobseeker_id' => 2,
            ],

        ]);
    }
}
