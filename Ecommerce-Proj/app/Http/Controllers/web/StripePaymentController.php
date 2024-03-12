<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\OrderTable;
use App\Models\UserCartProduct;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StripePaymentController extends Controller
{
    /**
     * check Out method
     */
    public function checkout($orderID){
        // dd($orderID);
        // $orderID = ;
        // dd($orderID->id);
        
       
       
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
            'metadata' => [
                'order_id' => $orderID, // Include the order ID as metadata
            ],
            'mode' => 'payment',
            'success_url' => route('success.post', [], true).'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('cancel.post' , [] ,  true),

            ]);


            return redirect($session->url);

    }

    /**
     * success url
     */
    public function success(Request $request)
    {
        \Stripe\Stripe::setApiKey('sk_test_51Ot5PyI8VivPSPAdUgqrtMcy6N4zERlHyJgo49T74UDdqensyPAHHmzQYcB0AI7tSU80zhvSyp6DmfKJBAC9LveM00DCzOQiZz');

        $sessionId = $request->get('session_id');
        if (!$sessionId) {
            throw new NotFoundHttpException('Session ID is missing');
        }

        try {
            $session = \Stripe\Checkout\Session::retrieve($sessionId);
        } catch (\Stripe\Exception\ApiErrorException $e) {
            // Handle Stripe API errors, such as invalid session ID
            return response()->json(['error' => 'Invalid session ID'], 400);
        }

        if (!$session) {
            // Return a response indicating that the session was not found
            return response()->json(['error' => 'Session not found'], 404);
        }

         // Retrieve order ID from metadata
        $orderId = $session->metadata['order_id'] ?? null;
        // dd($orderId);
        $order = OrderTable::find($orderId);
        // dd($order);

        if ($order) 
        {   
            
            // Update order status to 'paid' (assuming '1' represents 'paid')
            $order->update(['status'=>'success']);
            $order->save();
            dd($order);
        } else {
            // Handle the case where the order is not found
            return response()->json(['error' => 'Order not found'], 404);
        }

        return view('users.user_stripeSuccess', compact('session', 'order'));
    }

    /**
     * cancel url
     */
    public function cancel(){

    }
}
