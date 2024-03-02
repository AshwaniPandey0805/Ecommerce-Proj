<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
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
    public function addRolesPost(Request $request){

        /**
         * valodate the incoming request data
         */
        $request->validate([
            'role_id' => 'required',
            'role_name' => 'required',
        ]);

        /**
         * Create a new role instance and save it to the database
         */
        Role::create([
            'role_id' => $request->role_id,
            'role_name' => $request->role_name,
        ]);

        return redirect()->route('addRoles.get');
    }
}
