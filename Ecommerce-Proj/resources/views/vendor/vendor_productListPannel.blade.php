@extends('layouts.vendor')
@section('title', 'Add Products')
@section('vendor-content')
    <div class="table-header text-center bg-primary py-2 mb-3 shadow-lg rounded-lg">
        <h3 class="text-white">Products List</h3>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>SKU ID</th>
                <th>Selling Price</th>
                <th>Cost Price</th>
                <th>Quantity</th>
                <th>Manufacturer</th>
                <th>Weight</th>
                <th>Description</th>
                <th>Category ID</th>
                <th>Actions</th>
            </tr>   
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->sku_number }}</td>
                <td>{{ $product->selling_price }}</td>
                <td>{{ $product->cost_price }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->maufacture }}</td>
                <td>{{ $product->weight }}</td>
                <td>{{ $product->discription }}</td>
                <td>{{ $product->category }}</td>
                <td>
                    <a href="#" class="btn btn-primary">View</a>
                    <a href="#" class="btn btn-success">Edit</a>
                    <form action="# " method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection