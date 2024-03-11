@extends('layouts.user')
@section('title', 'Proceed to pay')
@section('user-content')
<div class="container">
    <div class="container">
        <h2 class="mt-4">Pay to Proceed</h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Payment Methods</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <label>
                                    <input type="radio" name="payment_method" value="credit_card">
                                    Credit Card
                                </label>
                            </li>
                            <li class="list-group-item">
                                <label>
                                    <input type="radio" name="payment_method" value="paypal">
                                    PayPal
                                </label>
                            </li>
                            <!-- Add more payment options as needed -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <button type="button" class="btn btn-primary">Proceed to Payment</button>
            </div>
        </div>
    </div>
@endsection