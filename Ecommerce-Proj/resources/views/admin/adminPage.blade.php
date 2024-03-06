@extends('layouts.admin')
@section('title', 'Admin Pannel');
@section('admin-content')
    @if (session()->has('message'))
        <div class="alert alert-success" >
            {{session('message')}}
        </div>
    @endif
    <h1>Welcome to the {{$users[0]->first_name}} {{$users[0]->last_name}}</h1>
    <p>This is the main content area. You can place your content here.</p>
@endsection