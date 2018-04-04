<?php

namespace App\Http\Controllers;

use App\Role;
use App\RoleUser;
use App\User;
use App\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list(){
        //fetch all posts data
//        $users = User::orderBy('updated_at','desc')->get();

        $users = DB::table('users')
            ->leftJoin('roles', 'users.role', '=', 'roles.id')
            ->select('users.*','roles.name as rolename')
            ->orderBy('updated_at','desc')
            ->get();


        //pass posts data to view and load list view
        return view('users.index', ['users' => $users]);
    }

    public function add(){
        //load form view
        $role = Role::all(['id', 'display_name']);

        return view('users.add', ['roles'=>$role]);
    }

    public function details($id){
        //fetch post data
        $user = User::find($id);



        //pass posts data to view and load list view
        return view('users.details', ['user' => $user]);
    }

    public function edit($id){
        //get post data by id
        $user = User::find($id);
        $role = Role::all(['id', 'display_name']);
        //load form view
        return view('users.edit', ['user' => $user,'roles'=>$role]);
    }


    public function insert(Request $request){

        $user = new User();

        //validate post data
        $data = $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        //insert post data
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->role = $request->role;
        $user->save();

        $role = Role::where('id', $request->role)->first();
        $user->attachRole($role);

        //store status message
        Session::flash('success_msg', 'User added successfully!');

        return redirect()->route('users.index');
    }

    public function update($id, Request $request){

        //validate post data
        $data = $this->validate($request, [
            'name' => 'required|string|max:255',
        ]);


        $roleNew = $request->role;
        //update post data
        $user = User::find($id);
        $user->name = $data['name'];
        $roleOld = $user->role;
        $user->role = $request->role;
        $user->save();

        $user->roles()->detach($roleOld);
        $role = Role::where('id', $roleNew)->first();
        $user->attachRole($role);

        //store status message
        Session::flash('success_msg', 'User updated successfully!');

        return redirect()->route('users.index');
    }

    public function delete($id){

        //update post data
        $user = User::find($id);
        $user->roles()->detach($user->role);
        $user->delete();


        //store status message
        Session::flash('success_msg', 'User deleted successfully!');

        return redirect()->route('users.index');
    }
}
