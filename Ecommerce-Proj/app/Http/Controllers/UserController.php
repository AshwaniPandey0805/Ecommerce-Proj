<?php

namespace App\Http\Controllers;

use App\Models\ProductTable;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * get user dash board 
     */
    public function getUserDashBoard(){
        
        $products = ProductTable::with('productImages')->get();
        // dd($products);
        return view('users.users_userDashBoard', compact('products'));
    }

    /**
     * get cart product page
     */
    public function getCartProduct(){
        return view('users.users_addTocartPannel');
    }
}
