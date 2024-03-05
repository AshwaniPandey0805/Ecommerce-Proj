@extends('layouts.vendor')
@section('title', 'Products')
@section('vendor-content')
    <div class="table-header text-center bg-primary py-2 mb-3 shadow-lg rounded-lg">
        <h3 class="text-white">Product Detail</h3>
    </div>
    {{-- {{dd($product->productImages)}} --}}
    <div class="container mt-5">
        <div class="row">
            @foreach ($product->productImages as $image)
                <div class="col-md-4 mb-3">
                    <!-- Product Image Section -->
                    
                        <img src="{{ asset($image->image_path) }}" class="card-img-top" alt="Product Image" style="width: 100px;">
                        
                    
                </div>
                @endforeach
            <div class="col-md-6">
                <!-- Product Details Section -->
                <div class="card">
                    <div class="card-body">
                        <!-- Product details -->
                        <h5 class="card-title">{{$product->product_name}}</h5>
                        <p class="card-text">{{$product->discription}}</p>
                        <!-- Additional product details -->
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">SKU ID: {{$product->sku_number}}</li>
                            <li class="list-group-item">Price:₹ {{$product->selling_price}}  </li>
                            <!-- Add more product details as needed -->
                        </ul>
                        <!-- Action buttons -->
                        <div class="mt-3">
                            <button type="button" class="btn btn-primary">Add to Cart</button>
                            <button type="button" class="btn btn-secondary">Buy Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        lorem*1000
        
    </div>
    
    
@endsection