    @extends('layouts.vendor')
    @section('title', 'Add Products')
    @section('vendor-content')
        <div class="table-header text-center bg-primary py-2 mb-3 shadow-lg rounded-lg">
            <h3 class="text-white">Add Products Items</h3>
        </div>
        <div class="container mt-4" style="max-width: 600px; margin: 0 auto;">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('addCategory.post') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="categoryName">Category Name:</label>
                            <input type="text" class="form-control" id="categoryName" name="categoryName" required>
                        </div>
                        <div class="form-group">
                            <label for="categoryID">Sub Category Of:</label>
                            <select class="form-control" id="categoryID" name="categoryID">
                                <option value="">No Sub-Category</option>
                                @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <input type="submit" value="Submit" class="btn btn-success font-weight-bolder ">
                            </div>
                        </div>
                        
                    </form>
                    <hr> <!-- Horizontal line -->
                    <form action="/submit-product" method="POST" enctype="multipart/form-data">
                        @csrf
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
                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <input type="submit" value="Submit" class="btn btn-primary font-weight-bold ">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
