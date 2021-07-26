<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'title' => 'title 1',
            ],
            [
                'title' => 'title 2',
            ],
            [
                'title' => 'title 3',
            ],
            [
                'title' => 'title 4',
            ],
            [
                'title' => 'title 5',
            ],
        ]);
    }
}
