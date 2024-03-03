<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
      * Getting Admin Pannel view -> GET Method
      */
      public function getAdminPannel(){

        $users = User::all();
        return view('admin.adminPage',['users' => $users]);
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
        $data['role'] = 101;

        

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

    /**
     * login method -> POST Method
     */
    public  function postLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)){
            return redirect()->route('getAdminPannel.get')->with('success', 'login success');
        }else{
            return redirect()->route('login.get')->with('error', 'Invalid credentials.');
        }
    }

    /**
     * logout method
     */
    public function logout(){
        Auth::logout();
        \Session::flush();

        return redirect()->route('login.get')-> with('succcess', 'Logout Successfully');
    }
}