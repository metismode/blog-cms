<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $member = new User();
        $member->name = 'Owner';
        $member->email = 'owner@gmail.com';
        $member->password = bcrypt('owner');
        $member->role ='2';
        $member->save();


        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('admin');
        $admin->role ='3';
        $admin->save();


    }
}
