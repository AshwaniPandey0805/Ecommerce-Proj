<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\AssignPermission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * get User table -> GET Method
     */
        public function getUsers()
    {
        $users = User::where('role_id', 104)->get();
        return view('admin.admin_users', ['users' => $users]);
    }

    /**
     * add roles and permissions -> GET method
     */
    public function addRoles(){
        $roles = Role::all();
        return view('admin.admin_addRoles',['roles' => $roles]);
    }

    /**
     * add roles and permissions
     */
    public function addRolesPost(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'role_id' => 'required|unique:roles',
            'role_name' => 'required',
            'permissions' => 'array', // Ensure permissions is an array
        ]);

        // Create a new role instance and save it to the database
        $role = Role::create([
            'role_id' => $request->role_id,
            'role_name' => $request->role_name,
        ]);

        // Attach permissions to the role if checkboxes were selected
        if ($request->has('permissions') && $role) {
            $permissions = $request->permissions;
            foreach ($permissions as $permission) {
                AssignPermission::create([
                    'role_id' => (int) $role-> role_id, 
                    'permission_id' => (int) $permission, 
                ]);
            }
        }

        // Redirect back with success message
        return redirect()->back()->with('success', 'Role added successfully');
    }
}
