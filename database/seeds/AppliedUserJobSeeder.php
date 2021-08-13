<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppliedUserJobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('applied_user')->insert([
            [
                'user_id' => '2',
                'applied_id' => '1'
            ],
            [
                'user_id' => '2',
                'applied_id' => '2'
            ],

        ]);
    }
}
