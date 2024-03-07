<?php

namespace App\Http\Controllers;

use App\Models\ProductTable;
use App\Models\UserCart;
use App\Models\UserCartProduct;
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

            /**
             * add card ID and user ID to user_cart db
             */
            UserCart::create([
                'card_id' => 101,
                'user_id' => $userID,
                'wish' => '0'
            ]);

            /**
             * getting card ID from user_cart DB
             */
            $UserCart = UserCart::all();

            $cardID = $UserCart[0]->card_id;
            
            UserCartProduct::create([
                'cart_id' => $cardID,
                'product_id' => $skuID,
                'qunatity' => 1,
            ]);

            


        }else{

            /**
             * adding card ID and user in in User cart db
             */
            UserCart::create([
                'card_id' => $cartItem[0]->sku_number,
                'user_id' => $userID,
                'wish' => '0'
            ]);

            /**
             * getting card ID from user_cart DB
             */
            $UserCart = UserCart::all();

            $cardID = $UserCart[0]->card_id;
            
            UserCartProduct::create([
                'cart_id' => $cardID,
                'product_id' => $skuID,
                'qunatity' => 1,
            ]);
        }
        
        return redirect()->back()->with('success', 'item added to user card table');
        

    }
}
