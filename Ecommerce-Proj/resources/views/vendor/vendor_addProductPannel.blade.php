@extends('layouts.vendor')
@section('title', 'Products')
@section('vendor-content')
    <div class="table-header text-center bg-primary py-2 mb-3 shadow-lg rounded-lg">
        <h3 class="text-white">Add Product</h3>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    {{-- {{dd($categories)}} --}}
    <div class="mt-5 p-4">
        <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="categoryID">Select Category:</label>
                    <select class="form-control" id="categoryID" name="categoryID">
                        <option value="">All</option>
                        
                        @foreach ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <hr>
                <br>
                <div class="form-group">
                    <label for="SubcategoryID">Select Subcategory:</label>
                    <select class="form-control" id="SubcategoryID" name="SubcategoryID">
                        <option value="">All</option>
                    </select>
                </div>
                
            </div>
            <div class="col-md-10">
                <form action="{{route('addProductsToDB.post')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_ID">Category ID:</label>
                                    <input type="text" class="form-control" id="category_ID" name="category_ID" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="productNumber">Product Name:</label>
                                    <input type="text" class="form-control" id="productNumber" name="productNumber" required>
                                </div>
                                <div class="form-group">
                                    <label for="skuID">SKU ID:</label>
                                    <input type="text" class="form-control" id="skuID" name="skuID" required>
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
        var selectCategory = document.getElementById('categoryID');
        var selectedSubCaegory = document.getElementById('SubcategoryID')

        selectCategory.addEventListener('change', function() {
            // Retrieve the selected value
            var selectedValue = selectCategory.value;

            
            // Perform actions based on the selected value
            getSubCategory(selectedValue);
            // You can add more actions here based on the selected value
        });

        selectedSubCaegory.addEventListener('change', function(){
            var selectedValue =  selectedSubCaegory.value;
            

            getCategoryId(selectedValue);


        })

        function getSubCategory(selectedValue){
            $.ajax({
                url:"{{route('getSubCategory.post')}}",
                type:'post',
                data : {
                    id : selectedValue,
                    _token : '{{csrf_token()}}',
                },
                success: function(response) {
                    console.log(response);
                    $('#SubcategoryID').empty(); // Clear existing options
                    $('#SubcategoryID').append('<option value="">All</option>'); // Add default option

                    // Loop through response data and append options
                    $.each(response, function(index, item) {
                        $('#SubcategoryID').append('<option value="' + item.id + '">' + item.category_name + '</option>');
                    });
                },
                error : function(error){
                    console.log(error);
                }
            })
        }

        function getCategoryId(selectedValue){
            $.ajax({
                url:"{{route('getCategoryID.post')}}",
                type : 'post',
                data : {
                    id : selectedValue,
                    _token : '{{csrf_token()}}'
                },

                success : function(response){
                    console.log(response[0].category_id )

                    let categoryIDElement = document.getElementById('category_ID')
                    categoryIDElement.value = response[0].id
                    console.log(categoryIDElement);


                },
                error : function(error){
                    console.log(error);
                }
            })
        }
    </script>

@endsection
