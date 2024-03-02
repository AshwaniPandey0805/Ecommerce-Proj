<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * get register page -> GET method
     */
    public function getRegisterUser(){
        return view('auth.registerPage');
     }

     /**
      * get login page -> GET method
      */
     public function getLogin(){
        return view('auth.loginPage');
     }

     /**
      * post register details -> POST method
      */
    public function postRegisterUsers(Request $request){

        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required',
            'password' => 'required', // 'password_confirmation' field must match 'password'
            'password_confirmation' => 'required',
        ]);

        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['email'] = $request->email;
        $data['phone_number'] = $request->phone_number;
        $data['password'] = Hash::make($request->password);
        $data['role_id'] = 104;

        

        $password['password'] = $request->password;
        $password['cpassword'] = $request->password_confirmation;
        if($password['password'] ===  $password['cpassword']){
            
           $users = User::create($data);

           /**
            * validate password
            */
           if(!$users){
                return redirect(route('getRegisterPage.get'));
            }

        }

        return redirect(route('login.get'));
    }
}
