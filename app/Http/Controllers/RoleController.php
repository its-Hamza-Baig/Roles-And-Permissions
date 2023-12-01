<?php

namespace App\Http\Controllers;
use DB;
use Spatie\Permission\Models\Role;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    
    
    public function index()
    {
        $roles = Role::all();
        return view('role.index', compact('roles'));
    }

    
    public function create()
    {
        $permissions = Permission::all();
        return view('role.create', compact('permissions'));
    }

    
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
        
        $role = Role::create(['name' => $request->input('name')]);
        
        $role->syncPermissions($request->permission);
    
        return redirect()->route('roles.index')
                        ->with('success','Role created successfully');
    }


    
    public function show(string $id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
            ->where("role_has_permissions.role_id",$id)
            ->get();
           
        return view('role.show',compact('role','rolePermissions'));
    }

    
    public function edit(string $id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();
    
        return view('role.edit',compact('role','permission','rolePermissions'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
    
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
    
        $role->syncPermissions($request->input('permission'));
    
        return redirect()->route('roles.index')
                        ->with('success','Role updated successfully');
        
    }

    
    public function destroy(string $id)
    {
        DB::table("roles")->where('id',$id)->delete();
        return redirect()->route('roles.index');
    }

}
