<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActiveSunscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pruchased_subscriptions')->insert([
            [
                'employer_id' => '1',
                'status' => '1',
                'title' => 'Demo Title',
                'price' => '1000',
                'valid_job' => '5',
                'color' => '#000000',
                'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document.'
            ]
        ]);
    }
}
