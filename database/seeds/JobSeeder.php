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
                'job_title' => 'demo title',
                'description' => 'this is description',
                'salary_type' => 'per month',
                'occupation' => 'laravel developer',
                'education' => 'BSAC',
                'experience' => '3 Year',
            ],
            [
                'employer_id' => '1',
                'status' => 'open',
                'category_id' => '2',
                'job_title' => 'demo title 2',
                'description' => 'this is description',
                'salary_type' => 'per month',
                'occupation' => 'php developer',
                'education' => 'SE',
                'experience' => '2 Year',
            ],
        ]);
    }
}
