@extends('layouts.admin')
@section('title', 'Users')
@section('admin-content')
<div class="table-header text-center bg-primary py-2 mb-3">
    <h3 class="text-white">Add roles and permissions</h3>
</div>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
<div class="p-4" >
    <div class="table">
        <div class="row">
            <div class="col-md-4">
                <form action="{{route('addRolesPost.Post')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="role_id">Role ID:</label>
                        <input type="text" class="form-control" id="role_id" name="role_id" required>
                    </div>
                    <div class="form-group">
                        <label for="role_name">Role Name:</label>
                        <input type="text" class="form-control" id="role_name" name="role_name" required>
                    </div>
                    <button type="submit" class="btn btn-primary font-weight-bolder">Add Role</button>
                </form>
            </div>
            <div class="col-md-4">
                <h4>Assign Permissions</h4>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="permission1" name="permissions[]" value="permission1">
                    <label class="form-check-label" for="permission1">Create</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="permission2" name="permissions[]" value="permission2">
                    <label class="form-check-label" for="permission2">Update</label>
                </div>
                <!-- Add more checkboxes for Permissions 1 -->
            </div>
            <div class="col-md-4">
                <p></p>
                
                <br>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="permission3" name="permissions[]" value="permission3">
                    <label class="form-check-label" for="permission3">Delete</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="permission4" name="permissions[]" value="permission4">
                    <label class="form-check-label" for="permission4">Permission4</label>
                </div>
                <!-- Add more checkboxes for Permissions 2 -->
            </div>
        </div>
    </div>
    <div class="table-responsive mt-5">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Role ID</th>
                    <th>Role Name</th>
                    <th>Permissions</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->id }}</td>
                        <td>{{ $role->role_id }}</td>
                        <td>{{ $role->role_name }}</td>
                        <td>Create, Update, Delete, </td>
                        <td>
                            <!-- Update Button -->
                            <form action="#" method="GET" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-primary mr-2">Update</button>
                            </form>
                            <!-- Delete Button -->
                            <form action="{{ route('deleteRole', $role->id) }}" method="POST" class="d-inline">
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
