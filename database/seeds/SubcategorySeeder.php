<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subcategories')->insert([
            [
                'category_id' => '1',
                'title' => 'Teacher',
                'image' => 'category_images/01.png',
            ],
            [
                'category_id' => '1',
                'title' => 'Hod',
                'image' => 'category_images/02.png',
            ],
            [
                'category_id' => '1',
                'title' => 'Coardinator',
                'image' => 'category_images/03.png',
            ],
            [
                'category_id' => '2',
                'title' => 'Laravel Developer',
                'image' => 'category_images/04.png',
            ],
            [
                'category_id' => '2',
                'title' => 'Android Developer',
                'image' => 'category_images/05.png',
            ],
            [
                'category_id' => '2',
                'title' => 'React Native Developer',
                'image' => 'category_images/06.jpeg',
            ],
            [
                'category_id' => '3',
                'title' => 'Lawyer',
                'image' => 'category_images/07.jpg',
            ],
            [
                'category_id' => '3',
                'title' => 'Domicile Maker',
                'image' => 'category_images/08.png',
            ],
            [
                'category_id' => '3',
                'title' => 'Stamp Stellar',
                'image' => 'category_images/09.png',
            ],
        ]);
    }
}
