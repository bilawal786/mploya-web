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
            ],
            [
                'category_id' => '1',
                'title' => 'Hod',
            ],
            [
                'category_id' => '1',
                'title' => 'Coardinator',
            ],
            [
                'category_id' => '2',
                'title' => 'Laravel Developer',
            ],
            [
                'category_id' => '2',
                'title' => 'Android Developer',
            ],
            [
                'category_id' => '2',
                'title' => 'React Native Developer',
            ],
            [
                'category_id' => '3',
                'title' => 'Lawyer',
            ],
            [
                'category_id' => '3',
                'title' => 'Domicile Maker',
            ],
            [
                'category_id' => '3',
                'title' => 'Stamp Stellar',
            ],
        ]);
    }
}
