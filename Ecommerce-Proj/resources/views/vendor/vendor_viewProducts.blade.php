@extends('layouts.vendor')
@section('title', 'Products')
@section('vendor-content')
    <div class="table-header text-center bg-primary py-2 mb-3 shadow-lg rounded-lg">
        <h3 class="text-white">Add Product</h3>
    </div>
    <div class="mt-5 p-4">
        <div class="row">
            <div class="col-md-2">
                <form action="{{ route('addCategory.post') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <label for="categoryID">Select Category:</label>
                        <select class="form-control" id="categoryID" name="categoryID">
                            <option value="">All</option>
                            {{-- @foreach ($categories as $item)
                                <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                            @endforeach --}}
                        </select>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="submit" value="Submit" class="btn btn-success font-weight-bolder ">
                        </div>
                    </div>
                    
                </form>
            </div>
            <div class="col-md-10">
                <form action="/submit-product" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="productCategory">Product Category:</label>
                                    <input type="text" class="form-control" id="productCategory" name="productCategory">
                                </div>
                                <div class="form-group">
                                    <label for="productNumber">Product Name:</label>
                                    <input type="text" class="form-control" id="productNumber" name="productNumber" required>
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
                                    <label for="quantity">Quantity:</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity" required>
                                </div>
                                <div class="form-group">
                                    <label for="manufacturer">Manufacturer:</label>
                                    <input type="text" class="form-control" id="manufacturer" name="manufacturer">
                                </div>
                                <div class="form-group">
                                    <label for="weight">Weight (in grams):</label>
                                    <input type="number" class="form-control" id="weight" name="weight">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description:</label>
                                    <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                                </div>
                                {{-- <div class="form-group">
                                    <label for="dimensions">Dimensions (L x W x H in cm):</label>
                                    <input type="text" class="form-control" id="dimensions" name="dimensions">
                                </div> --}}
                                {{-- <div class="form-group">
                                    <label for="image">Product Image:</label>
                                    <input type="file" class="form-control-file" id="image" name="image">
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-auto">
                            <input type="submit" value="Submit" class="btn btn-primary font-weight-bold">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        
    </script>
@endsection
