<?php

namespace App\Http\Controllers;

use App\Models\OrderedProducts;
use App\Models\OrderProduct;
use App\Models\OrderTable;
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
        $userCartProduct = UserCartProduct::with('productWithImages')->get();
        // dd($userCartProduct[0]->productWithImages->selling_price);
        $subTotal = 0;
        $taxRate = 0.1; // 10% tax rate, you can adjust this as needed
        $totalTax = 0;
        $total = 0;
        foreach($userCartProduct as $item) {
            $subTotal += ($item->productWithImages->selling_price) * ($item->qunatity);
        }
        
        // Calculate tax
        $totalTax = $subTotal * $taxRate;
        
        // dd($subTotal);
        // Calculate total
        $total = $subTotal + $totalTax;
        // dd($subTotal);
        
        return view('users.users_addTocartPannel' , compact('userCartProduct', 'subTotal', 'total'));
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
            // UserCart::create([
            //     'card_id' => $cartItem[0]->sku_number,
            //     'user_id' => $userID,
            //     'wish' => '0'
            // ]);

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

    /**
     * 
     */
    public function handleQuantity($product_id,$type){
        switch($type){
            case '-':
                    $cart=UserCartProduct::where('product_id',$product_id)->first();
                    if($cart->qunatity >1){
                        $cart->qunatity -=1;
                        $cart->save();
                        return back();
                    }
                    return back();
            case '+':
                    $cart=UserCartProduct::where('product_id',$product_id)->first();
                    if($cart->qunatity <5){
                        $cart->qunatity +=1;
                        $cart->save();
                        return back();
                    }
                    return back();
        }
    }

    /**
     * 
     */
    // Find the item in the cart
    public function removeFromCart($product_id)
    {
        // Find the item in the cart
        $cartItem = UserCartProduct::where('product_id', $product_id)->first();

        // Remove the item from the cart
        if ($cartItem) {
            $cartItem->delete();
        }

        return redirect()->back()->with('success', 'Item removed from cart successfully.');
    }

    /**
     * method to place order
     */
    public function placeOrder($userID){

        // dd($userID);





        $userCartProduct = UserCartProduct::with('productWithImages')->get();
        // dd($userCartProduct[0]->productWithImages->selling_price)
        $subTotal = 0;
        $taxRate = 0.1; // 10% tax rate, you can adjust this as needed
        $totalTax = 0;
        $total = 0;
        foreach($userCartProduct as $item) {
            $subTotal += ($item->productWithImages->selling_price) * ($item->qunatity);
        }
        
        $totalTax = $subTotal * $taxRate;
        $total = $subTotal + $totalTax;

        // dd($userCartProduct[0]->product_id);
        // dd($userCartProduct->product_id);


        /**
         * Store order  details in OrderTable Model
         */


        
        $order = OrderTable::create([
            'customer_id' => $userID,
            'total_amount' => $total,
            'tax' => 0.10,
        ]);

        /**
         * Store product related to order ID
         */ 

        foreach($userCartProduct as $product){
            $OrderedProduct = OrderedProducts::create([
                'order_id' =>  $order->id,
                'product_id' => $product->product_id,
                'quantity' => $product->qunatity
             ]);

        }
         

        


        return view('users.user_placeOrderPage', compact('userCartProduct', 'subTotal', 'total', 'order'));


    }
}
