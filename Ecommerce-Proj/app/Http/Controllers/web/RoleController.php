<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * get view page for individual user
     */
    public function viewRole(){
        return view('admin.admin_viewPermission');
    }

    // Method to show the form for updating a role
    public function update($id)
    {
        // Retrieve the role from the database
        $role = Role::find($id);
        
        // Return the view for updating the role with the role data
        return view('updateRole', compact('role'));
    }

    // Method to handle the delete action
    public function destroy($id)
    {
        // Find the role by ID and delete it
        $role = Role::find($id);
        $role->delete();
        
        // Redirect back with success message or to a specific route
        return redirect()->back()->with('success', 'Role deleted successfully');
    }
}
