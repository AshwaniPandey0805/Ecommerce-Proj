@extends('layouts.user')
@section('title', 'Place Order')
@section('user-content')
<div class="container">
    <h2 class="mt-4">Place Order</h2>
    <form action="{{route('checkout.post')}}" method="post">
        @csrf

        <div class="row">
            
            <div class="col-md-6">
                <h3>Delivery Address:</h3>
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="city">City:</label>
                    <input type="text" id="city" name="city" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="state">State/Province:</label>
                    <input type="text" id="state" name="state" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="postal_code">Postal Code:</label>
                    <input type="text" id="postal_code" name="postal_code" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="country">Country:</label>
                    <input type="text" id="country" name="country" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order Summary</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Subtotal:
                                <span>₹ {{$subTotal}}.00</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Tax:
                                <span>10%</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Total:
                                <span>₹ {{$total}}.00</span>
                            </li>
                        </ul>
                        
                        
                    </div>
                </div>
                {{-- <div class="mt-5">
                    <h3 class="text-center">Payment Method:</h3> <!-- Center-aligned heading -->
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" id="online_payment" value="online" required>
                            <label class="form-check-label" for="online_payment">Online Payment</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" id="cash_on_delivery" value="cod">
                            <label class="form-check-label" for="cash_on_delivery">Cash on Delivery</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" id="credit_card" value="credit_card">
                            <label class="form-check-label" for="credit_card">Credit Card</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="payment_method" id="paypal" value="paypal">
                            <label class="form-check-label" for="paypal">PayPal</label>
                        </div>
                    </div>
                </div> --}}
                <div class="form-group text-center mt-5"> <!-- Added "text-center" class to center-align content -->
                    <input type="submit" value="Place Order" class="btn btn-primary">
                </div>
            </div>
            
            
            
        </div>
        <div class="row">
            
            
            
            <div class="col-md-6">
                <h3>Additional Notes (Optional):</h3>
                <div class="form-group">
                    <textarea id="additional_notes" name="additional_notes" class="form-control" rows="4"></textarea>
                </div>
                {{-- <h3>Order Total: $[Total amount]</h3> --}}
                
            </div>
           
        </div>
        
    </form>
</div>

@endsection