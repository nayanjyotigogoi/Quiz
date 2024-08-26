<!-- resources/views/register.blade.php -->

@extends('layouts.layout')

@section('title', 'Register - Online Quiz System')

@section('custom-css')
    <style>
        .register {
            background-color: #f9f9f9;
            padding: 50px 0;
            min-height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .register-card {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
        }
    </style>
@endsection

@section('content')

    <!-- Register Section -->
    <section class="register">
        <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (Session::has('success'))
            <div class="alert alert-info alert-dismissible fade show">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if (Session::has('fail'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ Session::get('fail') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <div class="register-card">
                <h2 class="text-center mb-4">Register</h2>
                <form action="{{ url('store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="announcement" class="form-label fw-bold" style="color: black;">Name <span style="color:red;font-size:15px;">*</span></label>
                        <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="announcement" class="form-label fw-bold" style="color: black;">Email<span style="color:red;font-size:15px;">*</span></label>
                        <input type="text" name="email" id="email" class="form-control" value="{{old('email')}}" autocomplete="off" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold" style="color: black;">Password<span style="color:red;font-size:15px;">*</span></label>
                        <input type="password" class="form-control" value="{{old('password')}}" autocomplete="off", id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label fw-bold" style="color: black;">Confirm Password<span style="color:red;font-size:15px;">*</span></label>
                        <input type="password" class="form-control" value="{{old('password_confirmation')}}" autocomplete="off", id="password_confirmation" name="password_confirmation" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <div class="text-center mt-3">
                        <p>Already have an account? <a href="{{url('login/') }}">Login here</a>.</p>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
