<?php


use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = new Role();
        $user->name         = 'user';
        $user->display_name = 'User'; // optional
        $user->description  = 'User register'; // optional
        $user->save();

        $owner = new Role();
        $owner->name         = 'owner';
        $owner->display_name = 'Project Owner'; // optional
        $owner->description  = 'User is the owner of a given project'; // optional
        $owner->save();

        $admin = new Role();
        $admin->name         = 'admin';
        $admin->display_name = 'User Administrator'; // optional
        $admin->description  = 'User is allowed to manage and edit other users'; // optional
        $admin->save();

        $user = User::where('name', '=', 'owner')->first();
        $user->attachRole($owner);

        $user = User::where('name', '=', 'admin')->first();
        $user->attachRole($admin);


    }
}
