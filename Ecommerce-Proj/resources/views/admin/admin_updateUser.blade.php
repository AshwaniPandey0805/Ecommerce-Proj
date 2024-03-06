@extends('layouts.admin')
@section('title', 'Update user')
@section('admin-content')
<div class="table-header text-center bg-primary py-2 mb-3 shadow-lg rounded-lg">
    <h3 class="text-white">Update User</h3>
</div>
<div class="row ">
    <div class="col-md-8">
        
        <div class="container mt-5">
            <form action="{{route('addUser.post')}}" method="POST"  class="m-5" enctype="multipart/form-data"  >
                @csrf
                <h2 class="mb-5">Registration Form</h2>
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control" id="firstName" placeholder="Enter First Name" name="firstName" value="{{$users->first_name}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" id="lastName" placeholder="Enter Last Name" name="lastName" value="{{$users->last_name}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="{{$users->email}}">
                </div>
                <div class="form-group">
                    <label for="phoneNumber">Phone Number</label>
                    <input type="tel" class="form-control" id="phoneNumber" placeholder="Enter Phone Number" name="phoneNumber" value="{{$users->phone_number}}" >
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="role">Role</label>
                    <select class="form-control" id="role" name="assignRole" required>
                        <option value="">Select Role</option>
                        @foreach ($roles as $item)
                        <option value="{{$item->role_id}}">{{$item->role_name}}</option>
                        {{-- <option value="user">User</option> --}}
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Product Image:</label>
                    <input type="file" class="form-control-file" id="image" name="image[]" multiple>
                </div>
                <div class="form-group">
                    <h4>Assign Permissions:</h4>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="create" name="permissions[]" value="1">
                        <label class="form-check-label" for="create">Create</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="update" name="permissions[]" value="2">
                        <label class="form-check-label" for="update">Update</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="delete" name="permissions[]" value="3">
                        <label class="form-check-label" for="delete">Delete</label>
                    </div>
                    <!-- Add more checkboxes for Permissions -->
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <div class="col-md-4">
        <div class="container mt-5">
            <h3 class="mb-5" >Role Table</h3>
            <hr>
            
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Role ID</th>
                        <th scope="col">Role Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $item)
                    <tr>
                        <td>{{$item->role_id}}</td>
                        <td>{{$item->role_name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection