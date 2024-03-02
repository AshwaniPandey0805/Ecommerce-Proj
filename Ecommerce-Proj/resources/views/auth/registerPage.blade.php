@extends('layouts.app')

@section('title', 'Register Page')

@section('content')
    {{-- main content --}}
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        {{-- login content --}}
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            {{-- left Box --}}
            <div class="col-md-5 rounded-4 d-flex justify-content-center align-items-center flex-column left-box left-background-color">
                <div class="featured-iamge mb-4">
                    <img src="{{ asset('/assets/1.png') }}" alt="" class="img-fluid" style="width: 250px">
                </div>
                <p class="text-white fs-2">Be verified</p>
                <small class="mb-4 text-white text-wrap text-center" style="width: 17rem">Join Experienced Designer on this platform</small>
            </div>
            {{-- Right Box --}}
            
            <div class="col-md-7 right-box mt-4 mt-md-2">
                <div class="p-3">
                    <div class="row align-items-center">
                        <div class="header-text rounded-5 mb-4  bg-secondary p-2">
                            <h1 class="text-center text-white">Register User</h1>
                        </div>
                        <form method="POST" action="#">
                            @csrf
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <label for="first_name" class="form-label fs-4">First Name</label>
                                    <input type="text" id="first_name" class="form-control form-control-lg bg-light fs-5" name="first_name" placeholder="First Name" required>
                                    <small class="text-danger">Error message for First Name field</small>
                                </div>
                                <div class="col-sm-6">
                                    <label for="last_name" class="form-label fs-4">Last Name</label>
                                    <input type="text" id="last_name" class="form-control form-control-lg bg-light fs-5" name="last_name" placeholder="Last Name" required>
                                    <small class="text-danger">Error message for Last Name field</small>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <label for="email" class="form-label fs-4">Email</label>
                                    <input type="text" id="email" class="form-control form-control-lg bg-light fs-5" name="email" placeholder="Enter Email" required>
                                    <small class="text-danger">Error message for Email field</small>
                                </div>
                                <div class="col-sm-6">
                                    <label for="phone_number" class="form-label fs-4">Phone Number</label>
                                    <input type="text" id="phone_number" class="form-control form-control-lg bg-light fs-5" name="phone_number" placeholder="Enter Phone Number" required>
                                    <small class="text-danger">Error message for Phone Number field</small>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-sm-6">
                                    <label for="password" class="form-label fs-4">Enter Password</label>
                                    <input type="password" id="password" class="form-control form-control-lg bg-light fs-5" name="password" placeholder="Enter Password" required>
                                    <small class="text-danger">Error message for Password field</small>
                                </div>
                                <div class="col-sm-6">
                                    <label for="password_confirmation" class="form-label fs-4">Confirm Password</label>
                                    <input type="password" id="password_confirmation" class="form-control form-control-lg bg-light fs-5" name="password_confirmation" placeholder="Confirm Password" required>
                                    <small class="text-danger">Error message for Confirm Password field</small>
                                </div>
                            </div>
                            <!-- Additional fields can be added here -->
                            <div class="row">
                                <div class="col-sm-12 d-flex justify-content-center mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg fs-5 w-50">Register</button>
                                </div>
                            </div>
                        </form>
                        <div class="col-md-12 text-center mt-3">
                            <p>If you already have an account, <a href="#">login here</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(Session::has('message'))

    <p>{{Session::get('messsage')}}</p>

    @endif
@endsection
