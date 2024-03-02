@extends('layouts.admin')
@section('title', 'Admin Pannel');
@section('admin-content')
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
@endsection