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
                'job_title' => 'Laravel Teacher',
                'description' => 'Lorem ipsum represents a long-held tradition for designers,typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.', 'requirements' => 'Lorem ipsum represents a long-held tradition for designers,typographers and the.',
                'skills' => 'Laravel, Apis',
                'link' => 'https://www.test.com',
                'vacancies' => '10',
                'job_type' => 'Part time',
                'min_salary' => '20000',
                'max_salary' => '80000',
                'salary_type' => 'per month',
                'occupation' => 'laravel teacher',
                'education' => 'BSC',
                'min_experience' => '1',
                'max_experience' => '3',
            ],
            [
                'role' => 'employer',
                'employer_id' => '1',
                'status' => 'open',
                'category_id' => '2',
                'subcategory_id' => '5',
                'job_title' => 'Laravel Develoepr',
                'description' => 'Lorem ipsum represents a long-held tradition for designers,typographers and the like. Some people hate it and argue for its demise, but others ignore the hate as they create awesome tools to help create filler text for everyone from bacon lovers to Charlie Sheen fans.', 'requirements' => 'Lorem ipsum represents a long-held tradition for designers,typographers and the.',
                'requirements' => 'Lorem ipsum represents a long-held tradition for designers,typographers and the.',
                'skills' => 'Html,Css, Laravel, Php',
                'link' => 'https://www.test2.com',
                'vacancies' => '20',
                'job_type' => 'Full time',
                'min_salary' => '30000',
                'max_salary' => '60000',
                'salary_type' => 'per month',
                'occupation' => 'php developer',
                'education' => 'SE',
                'min_experience' => '1',
                'max_experience' => '2',
            ],
            [
                'role' => 'admin',
                'employer_id' => '1',
                'status' => 'open',
                'category_id' => '3',
                'subcategory_id' => '7',
                'job_title' => 'Lawyer Required',
                'description' => 'Lorem ipsum represents a long-held tradition for designers,
                        typographers and the like. Some people hate it and argue for
                        its demise, but others ignore the hate as they create awesome
                        tools to help create filler text for everyone from bacon lovers
                        to Charlie Sheen fans.',
                'requirements' => 'Lorem ipsum represents a long-held tradition for designers,
                        typographers and the.',
                'skills' => 'Good speeking, Good looking',
                'link' => 'https://www.test2.com',
                'vacancies' => '20',
                'job_type' => 'Full time',
                'min_salary' => '50000',
                'max_salary' => '60000',
                'salary_type' => 'per month',
                'occupation' => 'Lawyer',
                'education' => 'LLB',
                'min_experience' => '2',
                'max_experience' => '3',
            ],
        ]);
    }
}
