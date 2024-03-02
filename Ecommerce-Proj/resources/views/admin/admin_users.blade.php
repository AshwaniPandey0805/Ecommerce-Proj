@extends('layouts.admin')
@section('title', 'Users')
@section('admin-content')
<div class="table-header text-center bg-primary py-2 mb-3">
    <h3 class="text-white">User List</h3>
</div>
<div class="container">
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    
                    <th>Phone Number</th>
                    <th>Role ID</th>
                    <th>Actions</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        
                        <td>{{ $user->phone_number }}</td>
                        <td>{{ $user->userRole->role_name }}</td>
                        <td>
                            <!-- Update Button -->
                            <form action="#" method="GET" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                            <!-- View Button -->
                            <form action="{{route('viewRole.get')}}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-success">View</button>
                            </form>
                            <!-- Delete Button -->
                            <form action="#" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection