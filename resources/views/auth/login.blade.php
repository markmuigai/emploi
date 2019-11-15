@extends('layouts.sign')

@section('title','Emploi :: Login')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('user_title','Login')

<form method="post" action="{{ route('login') }}">
    @csrf
    <div class="form-group">
        <label for="">Email Address or Username</label>
        <input type="text" name="username" required="required" class="form-control" placeholder="Username">
    </div>
    <div class="form-group">
        <label for=""></label>
        <input type="password" name="password" required="required" class="form-control " placeholder="Password">
    </div>
    <div class="d-flex justify-content-between align-items-center">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" checked="" id="">
            <label class="form-check-label" for="">
                Remember Me
            </label>
        </div>
        <div class="login-para">
            <p><a href="{{ route('password.request') }}" class="orange">Password reset</a></p>
        </div>
    </div>
    <div class="text-center">
        <button type="submit" name="button" class="btn btn-orange-alt px-5">Log In</button>
    </div>
</form>
@endsection