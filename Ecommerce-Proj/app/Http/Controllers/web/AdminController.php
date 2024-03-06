<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\AssignPermission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * get User table -> GET Method
     */
        public function getUsers()
    {
        $users = User::with('userRoles')->get();
        // dd($users[0]);
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
     * admin add users -> GET METHOD
     */
    public function addUser(){
        $roles = Role::all();
        return view('admin.admin_addUser',['roles' => $roles]);
    }

    /**
     * admin add users -> POST METHOD
     */
    public function addUserPost(Request $request){
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'phoneNumber' => 'required',
            'password' => 'required',
            'assignRole' => 'required',
            'permissions' => 'array',
            'image' => 'required'
        ]);

        $data['first_name'] = $request->firstName;
        $data['last_name'] = $request->lastName;
        $data['email'] = $request->email;
        $data['phone_number'] = $request->phoneNumber;
        $data['password'] = Hash::make($request->password);
        $data['role'] = (int) $request->assignRole;

        $permissions = $request->permissions;
        $files = $request->file('image');
        

        // If it's an array of files (multiple files uploaded)
        if(is_array($files)) {
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $fileName = time().'.'.$extension;
                $path = "uploads/userImage/";
                $imagePath[] = $path.$fileName; // Store each file path in an array
                $file->move($path, $fileName); // Move each file to the destination directory
            }
        } else {
            // If it's a single file uploaded
            $extension = $files->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $path = "uploads/userImage/";
            $imagePath = $path.$fileName;
            $files->move($path, $fileName); // Move the file to the destination directory
        }

        
        $data['user_image_path'] = $imagePath[0] ;

        
        $user = User::create($data);

         // Attach permissions to the role if checkboxes were selected
         if ($request->has('permissions')) {
            $permissions = $request->permissions;
            foreach ($permissions as $permission) {
                AssignPermission::create([
                    'role_id' => (int) $request->assignRole, 
                    'permission_id' => (int) $permission, 
                ]);
            }
        }

        if(!$user){
            return redirect()->back()->with('error', "Invalid Details");
        }

        return redirect()->route('getUsers.get')->with('success', 'User Added successfully');


    }
    
    /**
     * add roles and permissions
     */
    public function addRolesPost(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'role_id' => 'required|unique:roles,id',
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
                    'role_id' => (int) $role->role_id, 
                    'permission_id' => (int) $permission, 
                ]);
            }
        }

        // Redirect back with success message
        return redirect()->back()->with('success', 'Role added successfully');
    }

    /**
     * delete User based on there id-> POST METHOD
     */

     public function deleteUser(User $user)
     {
         $user->delete();
         return redirect()->back()->with('success', 'User deleted successfully');
     }


    /**
     * update user details method
     */
    public function updateUserDetail($id){
        $roles = Role::all();
        $user = User::find($id);
        // dd($user);
        return view('admin.admin_updateUser', [
            'users' => $user,
            'roles' => $roles
        ]);
    }
    
}
