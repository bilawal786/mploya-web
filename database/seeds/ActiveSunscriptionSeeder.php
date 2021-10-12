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
                'subscription_id' => '1',
                'employer_id' => '2',
                'status' => '1',
                'title' => 'Demo Title',
                'price' => '1000',
                'valid_job' => '8',
                'color' => '#000000',
                'description' => 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document.'
            ]
        ]);
    }
}
