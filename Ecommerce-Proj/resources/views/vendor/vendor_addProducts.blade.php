@extends('layouts.vendor');
@section('title', 'Add Product')
@section('vendor-content')
    {{-- <h1>Vendor Dash Board</h1> --}}
    <div class="table-header text-center bg-primary py-2 mb-3 shadow-lg rounded-lg">
        <h3 class="text-white">Add Products</h3>
    </div>
    
    <div class="container mt-5">
        <form action="{{route('addProductDetails.get')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="category">Category:</label>
                <select class="form-control" id="category" name="category" required>
                    <option value="">Select Category</option>
                    <option value="1">Electronics</option>
                    <option value="2">Clothing</option>
                    <option value="3">Home</option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
        {{-- <form action="/submit-product" method="POST" enctype="multipart/form-data" class="mt-5" >
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="productName">Product Name:</label>
                        <input type="text" class="form-control" id="productName" name="productName" required>
                    </div>
                    <div class="form-group">
                        <label for="skuNumber">SKU Number:</label>
                        <input type="text" class="form-control" id="skuNumber" name="skuNumber" required>
                    </div>
                    <div class="form-group">
                        <label for="sellingPrice">Selling Price:</label>
                        <input type="number" class="form-control" id="sellingPrice" name="sellingPrice" required>
                    </div>
                    <div class="form-group">
                        <label for="costPrice">Cost Price:</label>
                        <input type="number" class="form-control" id="costPrice" name="costPrice" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="productID">Product ID:</label>
                        <input type="text" class="form-control" id="productID" name="productID" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Category:</label>
                        <select class="form-control" id="category" name="category" required>
                            <option value="">Select Category</option>
                            <option value="1">Electronics</option>
                            <option value="2">Clothing</option>
                            <option value="3">Home</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category">Sub-Category:</label>
                        <select class="form-control" id="category" name="category" required>
                            <option value="">Select Category</option>
                            <optgroup label="Electronics">
                                <option value="2">Mobile</option>
                                <option value="2">Laptop</option>
                                <!-- Add more electronics subcategories as needed -->
                            </optgroup>
                            <optgroup label="Clothing">
                                <option value="Men">Men</option>
                                <option value="Women">Women</option>
                                <!-- Add more clothing subcategories as needed -->
                            </optgroup>
                            <optgroup label="Home">
                                <option value="Furniture">Furniture</option>
                                <option value="Appliances">Appliances</option>
                                <!-- Add more home subcategories as needed -->
                            </optgroup>
                            <!-- Add more main categories with their respective subcategories as needed -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="image">Image:</label>
                        <input type="file" class="form-control-file" id="image" name="image" accept="image/*" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form> --}}
    </div>
@endsection