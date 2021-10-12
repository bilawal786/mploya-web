<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            [
                'receiver' => 2,
                'user_id' => 5,
                'star' => 5,
                'description' => 'Lorem ipsum represents a long-held tradition for designers.'
            ],
            [
                'receiver' => 2,
                'user_id' => 5,
                'star' => 5,
                'description' => 'Lorem ipsum represents a long-held tradition for designers.'
            ],
            [
                'receiver' => 2,
                'user_id' => 5,
                'star' => 5,
                'description' => 'Lorem ipsum represents a long-held tradition for designers.'
            ],
            [
                'receiver' => 2,
                'user_id' => 5,
                'star' => 5,
                'description' => 'Lorem ipsum represents a long-held tradition for designers.'
            ],
            [
                'receiver' => 2,
                'user_id' => 5,
                'star' => 5,
                'description' => 'Lorem ipsum represents a long-held tradition for designers.'
            ],
            [
                'receiver' => 2,
                'user_id' => 5,
                'star' => 4,
                'description' => 'Lorem ipsum represents a long-held tradition for designers.'
            ],
            [
                'receiver' => 2,
                'user_id' => 5,
                'star' => 4,
                'description' => 'Lorem ipsum represents a long-held tradition for designers.'
            ],
            [
                'receiver' => 2,
                'user_id' => 5,
                'star' => 4,
                'description' => 'Lorem ipsum represents a long-held tradition for designers.'
            ], [
                'receiver' => 2,
                'user_id' => 5,
                'star' => 4,
                'description' => 'Lorem ipsum represents a long-held tradition for designers.'
            ],
            [
                'receiver' => 2,
                'user_id' => 5,
                'star' => 3,
                'description' => 'Lorem ipsum represents a long-held tradition for designers.'
            ],
            [
                'receiver' => 2,
                'user_id' => 5,
                'star' => 3,
                'description' => 'Lorem ipsum represents a long-held tradition for designers.'
            ],
            [
                'receiver' => 2,
                'user_id' => 5,
                'star' => 3,
                'description' => 'Lorem ipsum represents a long-held tradition for designers.'
            ],
            [
                'receiver' => 2,
                'user_id' => 5,
                'star' => 2,
                'description' => 'Lorem ipsum represents a long-held tradition for designers.'
            ],
            [
                'receiver' => 2,
                'user_id' => 5,
                'star' => 2,
                'description' => 'Lorem ipsum represents a long-held tradition for designers.'
            ],
            [
                'receiver' => 2,
                'user_id' => 5,
                'star' => 1,
                'description' => 'Lorem ipsum represents a long-held tradition for designers.'
            ],

            // jobseeker review

            [
                'receiver' => 5,
                'user_id' => 2,
                'star' => 5,
                'description' => 'Lorem ipsum represents a long-held tradition for designers.'
            ],
            [
                'receiver' => 5,
                'user_id' => 2,
                'star' => 5,
                'description' => 'Lorem ipsum represents a long-held tradition for designers.'
            ],
            [
                'receiver' => 5,
                'user_id' => 2,
                'star' => 5,
                'description' => 'Lorem ipsum represents a long-held tradition for designers.'
            ],
            [
                'receiver' => 5,
                'user_id' => 2,
                'star' => 5,
                'description' => 'Lorem ipsum represents a long-held tradition for designers.'
            ],
            [
                'receiver' => 5,
                'user_id' => 2,
                'star' => 5,
                'description' => 'Lorem ipsum represents a long-held tradition for designers.'
            ],
            [
                'receiver' => 5,
                'user_id' => 2,
                'star' => 4,
                'description' => 'Lorem ipsum represents a long-held tradition for designers.'
            ],
            [
                'receiver' => 5,
                'user_id' => 2,
                'star' => 4,
                'description' => 'Lorem ipsum represents a long-held tradition for designers.'
            ],
            [
                'receiver' => 5,
                'user_id' => 2,
                'star' => 4,
                'description' => 'Lorem ipsum represents a long-held tradition for designers.'
            ], [
                'receiver' => 5,
                'user_id' => 2,
                'star' => 4,
                'description' => 'Lorem ipsum represents a long-held tradition for designers.'
            ],
            [
                'receiver' => 5,
                'user_id' => 2,
                'star' => 3,
                'description' => 'Lorem ipsum represents a long-held tradition for designers.'
            ],
            [
                'receiver' => 5,
                'user_id' => 2,
                'star' => 3,
                'description' => 'Lorem ipsum represents a long-held tradition for designers.'
            ],
            [
                'receiver' => 5,
                'user_id' => 2,
                'star' => 3,
                'description' => 'Lorem ipsum represents a long-held tradition for designers.'
            ],
            [
                'receiver' => 5,
                'user_id' => 2,
                'star' => 2,
                'description' => 'Lorem ipsum represents a long-held tradition for designers.'
            ],
            [
                'receiver' => 5,
                'user_id' => 2,
                'star' => 2,
                'description' => 'Lorem ipsum represents a long-held tradition for designers.'
            ],
            [
                'receiver' => 5,
                'user_id' => 2,
                'star' => 1,
                'description' => 'Lorem ipsum represents a long-held tradition for designers.'
            ],
        ]);
    }
}
