@extends('layouts.sign')

@section('title','Emploi :: '.__('auth.login') )

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('user_title',__('auth.login') )

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
        <i class="fa fa-user" aria-hidden="true">
            Username or E-mail <b style="color: red" title="Required">*</b>
        </i>
        </label>
        <input type="text" name="username" required="required" value="{{ old('username') }}" class="form-control" placeholder="">
    </div>

    <div class="form-group">
        <label for="password">
        <i class="fa fa-key" aria-hidden="true">
            Password  <b style="color: red" title="Required">*</b>
        </i>
        </label>
        <input type="password" name="password" required="required" class="form-control" id="pass" placeholder="">
           <p style="display: none"><input type="checkbox" onclick="Toggle()"> Show Password</p> 
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
        <button type="submit" name="button" class="btn btn-orange-alt px-5">{{ __('auth.login') }}</button>
    </div>
</form>

<hr>
<h5 class="mt-4">Don't have an account?
    <a href="/join" class="btn btn-orange px-5">Sign Up</a>
</h5>

@include('components.ads.responsive')

 <script> 
    // Change the type of input to password or text 
        function Toggle() { 
            var temp = document.getElementById("pass"); 
            if (temp.type === "password") { 
                temp.type = "text"; 
            } 
            else { 
                temp.type = "password"; 
            } 
        } 
</script> 
@endsection
