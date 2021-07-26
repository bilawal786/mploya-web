<?php

use Illuminate\Database\Seeder;
use App\Admin;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
         $admin = new Admin;
        $admin->name = 'Admin';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('password');        
        $admin->save();
    }
}
