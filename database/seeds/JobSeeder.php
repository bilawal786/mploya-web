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
                'role' => 'employer',
                'employer_id' => '1',
                'status' => 'open',
                'category_id' => '1',
                'subcategory_id' => '1',
                'job_title' => 'Demo Title',
                'description' => 'Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.',
                'requirements' => 'Lorem ipsum represents a long-held tradition for designers,
                        typographers and the.',
                'skills' => 'Skills 1,Skills 2',
                'link' => 'https://www.test.com',
                'vacancies' => '10',
                'job_type' => 'Part time',
                'salary' => '10000',
                'salary_type' => 'per month',
                'occupation' => 'laravel developer',
                'education' => 'BSC',
                'experience' => '3 Year',
            ],
            [
                'role' => 'employer',
                'employer_id' => '1',
                'status' => 'open',
                'category_id' => '2',
                'subcategory_id' => '2',
                'job_title' => 'Demo Title 2',
                'description' => 'Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.',
                'requirements' => 'Lorem ipsum represents a long-held tradition for designers,
                        typographers and the.',
                'skills' => 'Skills 1,Skills 2',
                'link' => 'https://www.test2.com',
                'vacancies' => '20',
                'job_type' => 'Full time',
                'salary' => '20000',
                'salary_type' => 'per month',
                'occupation' => 'php developer',
                'education' => 'SE',
                'experience' => '2 Year',
            ],
            [
                'role' => 'admin',
                'employer_id' => '1',
                'status' => 'open',
                'category_id' => '2',
                'subcategory_id' => '2',
                'job_title' => 'Demo Title 3',
                'description' => 'Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.',
                'requirements' => 'Lorem ipsum represents a long-held tradition for designers,
                        typographers and the.',
                'skills' => 'Skills 1,Skills 2',
                'link' => 'https://www.test2.com',
                'vacancies' => '20',
                'job_type' => 'Full time',
                'salary' => '50000',
                'salary_type' => 'per month',
                'occupation' => 'php developer',
                'education' => 'SE',
                'experience' => '4 Year',
            ],
        ]);
    }
}
