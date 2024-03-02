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
        // $users = User::where('role', 104)->get();

        // $user = User::with('roles')->find(1);
        // dd($user);

        // $role = Role::find(4);
        // $users = $role->users;
        // dd($users);

        // $user = User::with('role')->get();
        // $roleName = $user[0]->role->role_name;
        // dd($roleName);

        // $users = User::with('role')->get();

        // foreach ($users as $user) {
        //     $roleName = $user->role->role_name;
        //     dd($roleName);
        // }

        // foreach ($users as $user) {
        //     $roleName = optional($user->role)->role_name;
        //     dd($roleName);
        // }
        

        
        

        $users = User::with('userRole')->get();
        // dd($users[0]->userRole->role_name);
        // dd($users[0]->role->with('userRole')->get());
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
            
            'role_name' => 'required',
            'permissions' => 'array', // Ensure permissions is an array
        ]);

        // Create a new role instance and save it to the database
        $role = Role::create([
            
            'role_name' => $request->role_name,
        ]);

        // Attach permissions to the role if checkboxes were selected
        if ($request->has('permissions') && $role) {
            $permissions = $request->permissions;
            foreach ($permissions as $permission) {
                AssignPermission::create([
                    'role_id' => (int) $role->id, 
                    'permission_id' => (int) $permission, 
                ]);
            }
        }

        // Redirect back with success message
        return redirect()->back()->with('success', 'Role added successfully');
    }


    /**
     * check relation
     */
    
}
