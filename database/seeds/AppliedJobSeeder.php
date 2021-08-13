<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppliedJobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('applieds')->insert([
            [
                'user_id' => '2',
                'status' => 'open',
                'job_id' => '1'
            ],
            [
                'user_id' => '2',
                'status' => 'open',
                'job_id' => '2'
            ],

        ]);
    }
}
