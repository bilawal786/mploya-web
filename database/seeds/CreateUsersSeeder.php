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
                'varify_email' => '1',
                'profile_status' => 'visible',
                'address' => 'lahore,pakistan',
                'password' => Hash::make('password'),

                'CNIC' => '',
                'phone' => '',
                'city' => '',
                'experience' => '',
                'country' => '',
                'father_name' => '',
                'description' => '',
                'occupation' => '',
                'language' => '',
                'facebook_link' => 'https://www.facebook.com',
                'instagram_link' => 'https://www.instagram.com',
                'twitter_link' => 'https://www.twitter.com',
                'linkedin_link' => 'https://www.linkedin.com',
                'education_name' => '',
                'education_description' => '',
                'education_complete_date' => '',
                'education_is_continue' => '',
                'project_title' => '',
                'project_occupation' => '',
                'project_year' => '2016,2013',
                'project_links' => '',
                'project_description' => '',
                'skill_name' => 'Skill 1, Skill 2',
                'certification_name' => '',
                'certification_year' => '',
                'certification_description' => '',
                'created_at' => '2020-08-09 16:40:17.000000',
                'updated_at' => '2021-08-09 16:40:17.000000',
            ],
            [
                'name' => 'Job Seeker',
                'email' => 'jobseeker@gmail.com',
                'user_type' => 'jobseeker',
                'varify_email' => '1',
                'profile_status' => 'visible',
                'address' => 'lahore,pakistan',
                'company_name' => '0',
                'password' => Hash::make('password'),
                'facebook_link' => '',
                'instagram_link' => '',
                'twitter_link' => '',
                'linkedin_link' => '',
                'CNIC' => '34302-3456512-4',
                'phone' => '222-333-444',
                'city' => 'Lahore',
                'experience' => '4 Year',
                'country' => 'USA',
                'father_name' => 'Ali Hassan',
                'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document',
                'occupation' => 'Laravel',
                'language' => 'PHP,CSS,JAVA',
                'education_name' => 'BSCS,BSIT',
                'education_description' => 'Description 1, Description 2',
                'education_complete_date' => '12/05/2020,04/05/2008',
                'education_is_continue' => 'Continue,Complete',
                'project_title' => 'Demo Title 1, Demo Title 2',
                'project_occupation' => 'Java,Laravel',
                'project_year' => '2016,2013',
                'project_links' => 'https://www.test.com,https://www.test2.com',
                'project_description' => 'Description 1, Description 2',
                'skill_name' => 'Skill 1, Skill 2',
                'certification_name' => 'Web Development, Graphic Designing',
                'certification_year' => '2016,218',
                'certification_description' => 'Description 1, Description 2',
                'created_at' => '2020-08-09 16:40:17.000000',
                'updated_at' => '2021-08-09 16:40:17.000000',

            ],
        ]);
    }
}
