@extends('layouts.admin')
@section('title', 'User Details')
@section('admin-content')
<div class="table-header text-center bg-primary py-2 mb-3">
    <h3 class="text-white">Add roles and permissions</h3>
</div>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Role</th>
                <th>Assigned Permissions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($permissions as $item)
                <tr>
                    <td>{{ $item->user->id }}</td>
                    <td>{{ $item->user->first_name }}</td>
                    <td>{{ $item->user->last_name }}</td>
                    <td>{{ $item->user->role }}</td>
                    <td>{{ $item->permission_id }}</td>
                    {{-- <td>{{ $role->role_id }}</td>
                    <td>{{ $role->role_name }}</td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection