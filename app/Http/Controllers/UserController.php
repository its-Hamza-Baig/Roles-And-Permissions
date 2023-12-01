<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Support\Arr;
    
use Spatie\Permission\Models\Permission;

use DB;
use Hash;

class UserController extends Controller
{
    
    

    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('user.create', compact('roles'));
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
        return redirect()->route('users.index');

        
    }

    
    public function show(string $id)
    {
        $user = User::find($id);
        return view('user.show', compact('user'));
    }

    
    public function edit(string $id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();

        return view('user.edit', compact('user', 'roles'));

    }

    
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'role' => 'required',
        ]);
        $inputs = $request->all();
        $user = User::find($id);
        $user->update($inputs);
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('role'));
        return redirect()->route('users.index');
    }

    
    public function destroy(string $id)
    {
        $user  = User::find($id);
        $user->delete();
        return redirect()->route('users.index');
    }

}
