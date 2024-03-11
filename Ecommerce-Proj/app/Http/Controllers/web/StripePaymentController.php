<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\UserCartProduct;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class StripePaymentController extends Controller
{
    /**
     * check Out method
     */
    public function checkout(){
        

       
       
       $userCartProduct = UserCartProduct::with('productWithImages')->get();
        // dd($userCartProduct[0]->productWithImages->productImages[0]->image_path);
        $subTotal = 0;
        $taxRate = 0.1; // 10% tax rate, you can adjust this as needed
        $totalTax = 0;
        $total = 0;
        foreach($userCartProduct as $item) {
            $subTotal += ($item->productWithImages->selling_price) * ($item->qunatity);
        }
        
        $totalTax = $subTotal * $taxRate;
        $total = $subTotal + $totalTax;

        $lineItem = [];

        foreach($userCartProduct as $product){
            $lineItem[] = [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $product->productWithImages->product_name,
                            // 'images' => asset($product->productWithImages->productImages[0]->image_path)
                        ],
                        
                        'unit_amount' => $product->productWithImages->cost_price * 100,
                    ],
                    'quantity' => $product->qunatity ,
                ];

            
        }

        // dd($lineItem);

        \Stripe\Stripe::setApiKey('sk_test_51Ot5PyI8VivPSPAdUgqrtMcy6N4zERlHyJgo49T74UDdqensyPAHHmzQYcB0AI7tSU80zhvSyp6DmfKJBAC9LveM00DCzOQiZz');

        $session = \Stripe\checkout\Session::create([
            'line_items' => $lineItem,
            'mode' => 'payment',
            'success_url' => route('seccess.post', [], true),
            'cancel_url' => route('cancel.post' , [] ,  true),

            ]);


            return redirect($session->url);

    }

    /**
     * success url
     */
    public function success(){

    }

    /**
     * cancel url
     */
    public function cancel(){

    }
}
