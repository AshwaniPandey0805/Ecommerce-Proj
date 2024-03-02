@extends('layouts.admin')
@section('title', 'Admin Pannel');
@section('admin-content')
    <h1>Welcome to the {{$users[0]->first_name}} {{$users[0]->last_name}}</h1>
    <p>This is the main content area. You can place your content here.</p>
@endsection