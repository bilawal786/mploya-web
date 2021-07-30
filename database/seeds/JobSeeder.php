<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jobs')->insert([
            [
                'employer_id' => '1',
                'status' => 'open',
                'category_id' => '1',
                'job_title' => 'Demo Title',
                'description' => 'Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.',
                'salary_type' => 'per month',
                'occupation' => 'laravel developer',
                'education' => 'BSAC',
                'experience' => '3 Year',
            ],
            [
                'employer_id' => '1',
                'status' => 'open',
                'category_id' => '2',
                'job_title' => 'Demo Title 2',
                'description' => 'Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.',
                'salary_type' => 'per month',
                'occupation' => 'php developer',
                'education' => 'SE',
                'experience' => '2 Year',
            ],
        ]);
    }
}
