<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

use Hash;
use App\Models\User;

class AddStudentController extends Controller
{
    public function addStudent(){
        $roles = Role::where('name','Student')->pluck('name', 'name')->all();

        return view('user.addstudent', compact('roles'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'same:confirm-password|required',
            'role' => 'required'
        ]);

        $inputs = $request->all();
        $inputs['password'] = Hash::make($inputs['password']);
        $user = User::create($inputs);
        $user->assignRole($request->input('role'));
        return redirect()->route('showStudent');

        
    }
    public function show()
    {
        // if(User::role('Student')){
        $users = User::role('Student')->get();
        return view('user.showstudent', compact('users'));
        // }else{ 
        //     return "no user yet";
        // }
    }
}
