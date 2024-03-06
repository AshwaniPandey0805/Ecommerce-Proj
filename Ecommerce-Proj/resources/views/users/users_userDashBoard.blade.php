@extends('layouts.user')
@section('title', 'User Panel')
@section('user-content')
<div class="table-header text-center bg-primary py-2 mb-3 shadow-lg rounded-lg">
    <h3 class="text-white">Product Detail</h3>
</div>
@if (session('success'))
    <div class="alert alert-success" >
        {{session('success')}}
    </div>
@endif

<div class="container mt-5">
    <div class="row">
        @foreach ($products as $item)
        {{-- {{dd($item->productImages->first()->image_path)}} --}}
            {{-- @foreach ($item->productImages->first() as $image) --}}
                <div class="col-md-4 mb-3">
                    <!-- Product Image Section -->
                    <img src="{{ asset($item->productImages->first()->image_path) }}" class="card-img-top" alt="Product Image" style="height: 100%">
                </div>
            {{-- @endforeach --}}
            <div class="col-md-8 mb-3">
                <!-- Product Details Section -->
                <div class="card">
                    <div class="card-body">
                        <!-- Product details -->
                        <h5 class="card-title">{{$item->product_name}}</h5>
                        <p class="card-text">{{$item->description}}</p>
                        <!-- Additional product details -->
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">SKU ID: {{$item->sku_number}}</li>
                            <li class="list-group-item"> Selling Price: ₹ {{$item->selling_price}}</li>
                            <li class="list-group-item">Cost Price: ₹ {{$item->cost_price}}</li>
                            <li class="list-group-item">Discription:  {{$item->discription}}</li>
                            {{-- <li class="list-group-item"><button>Add to wish list</button></li> --}}
                            <!-- Add more product details as needed -->
                        </ul>
                        <!-- Action buttons -->
                        <div class="mt-3">
                            <button type="button" class="btn btn-primary">
                                <a href="{{route('addToCartItem.post', $item->sku_number)}}" class="text-decoration-none text-white" style="width: 100%">Add To Cart</a>
                            </button>

                            <button type="button" class="btn btn-secondary"><a href="#" class="text-decoration-none text-white" style="width: 100%">Buy Now</a></button>

                            <button type="button" class="btn btn-info" ><a href="#" class="text-decoration-none text-white" style="width: 100%">Add To Wish Lisr</a></button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection