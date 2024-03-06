<?php

namespace App\Http\Controllers;

use App\Models\ProductTable;
use App\Models\UserCart;
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

    /**
     * add ro cart item 
     */
    public function addToCartItem($skuID){

        
        $cartItem = ProductTable::where('sku_number', $skuID)->get();
        $userID = auth()->user()->id;
        // dd($cartItem[0]->sku_number);

        $cart = UserCart::all();

        if($cart->isEmpty()){
            UserCart::create([
                'card_id' => 101,
                'user_id' => $userID,
                'wish' => '1'
            ]);
        }else{
            UserCart::create([
                'card_id' => $cartItem[0]->sku_number,
                'user_id' => $userID,
                'wish' => '1'
            ]);
        }
        
        return redirect()->back()->with('success', 'item added to user card table');
        

    }
}
