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
                'title' => 'Education',
                'image' => 'category_images/1627537181category.png',
            ],
            [
                'title' => 'Programing',
                'image' => 'category_images/1627537232category.png',
            ],
            [
                'title' => 'legal',
                'image' => 'category_images/1627537279category.png',
            ],
        ]);
    }
}
