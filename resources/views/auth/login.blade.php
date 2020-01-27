@extends('layouts.sign')

@section('title','Emploi :: Login')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('user_title','Login')

@include('components.social-auth')

<form method="post" action="{{ route('login') }}">
    @csrf
    @error('email')
    <div class="text-center my-2 py-1 alert alert-danger" role="alert">
        Invalid Email Address or Password
    </div>
    @enderror
    @error('username')
    <div class="text-center my-2 py-1 alert alert-danger" role="alert">
        Invalid Username or Password
    </div>
    @enderror
    <div class="form-group">
        <label for="username">
            Username or E-mail
        </label>
        <input type="text" name="username" required="required" value="{{ old('username') }}" class="form-control" placeholder="">
    </div>
    <div class="form-group">
        <label for="password">
            Password
        </label>
        <input type="password" name="password" required="required" class="form-control " placeholder="">
    </div>
    <div class="d-flex justify-content-between align-items-center">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" checked="" id="">
            <label class="form-check-label" for="">
                Remember Me
            </label>
        </div>
        <div class="login-para">
            <p><a href="{{ route('password.request') }}" class="orange">Forgot Password?</a></p>
        </div>
    </div>
    <div class="text-center">
        <button type="submit" name="button" class="btn btn-orange-alt px-5">Log In</button>
    </div>
</form>

<hr>
<h5 class="mt-4">Don't have an account?
    <a href="/join" class="btn btn-orange px-5">Sign Up</a>
</h5>
@endsection
