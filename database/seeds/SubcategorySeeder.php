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
                'image' => 'https://www.kindpng.com/picc/m/587-5872482_school-vector-teacher-illustration-hd-png-download.png',
            ],
            [
                'category_id' => '1',
                'title' => 'Hod',
                'image' => 'https://www.pinclipart.com/picdir/middle/132-1324165_employee-clipart-computer-worker-png-download.png',
            ],
            [
                'category_id' => '1',
                'title' => 'Coardinator',
                'image' => 'https://www.clipartmax.com/png/middle/52-521272_aditi-is-in-control-of-her-career-and-is-excited-to-excited.png',
            ],
            [
                'category_id' => '2',
                'title' => 'Laravel Developer',
                'image' => 'https://www.nicepng.com/png/detail/135-1352810_consultant-clipart-cartoon-employee-clipart.png',
            ],
            [
                'category_id' => '2',
                'title' => 'Android Developer',
                'image' => 'https://www.pngarea.com/pngm/113/7450196_motivation-png-cartoon-employee-png-transparent-png.png',
            ],
            [
                'category_id' => '2',
                'title' => 'React Native Developer',
                'image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQeOo8Ogbpw5JSJDwiwhVOqHZpSthDazmsZuvT40mlOZuiB3oNZ9JerjbH2aBAgWkudkek&usqp=CAU',
            ],
            [
                'category_id' => '3',
                'title' => 'Lawyer',
                'image' => 'https://png.pngtree.com/png-clipart/20200226/original/pngtree-flat-cartoon-illustration-law-and-judge-concept-png-image_5316315.jpg',
            ],
            [
                'category_id' => '3',
                'title' => 'Domicile Maker',
                'image' => 'https://www.pinclipart.com/picdir/middle/1-13055_lawyer-vector-desk-man-holding-laptop-drawing-clipart.png',
            ],
            [
                'category_id' => '3',
                'title' => 'Stamp Stellar',
                'image' => 'https://listimg.pinclipart.com/picdir/s/79-792936_person-taking-notes-man-with-laptop-vector-clipart.png',
            ],
        ]);
    }
}
