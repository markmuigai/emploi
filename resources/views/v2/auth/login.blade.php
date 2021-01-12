@extends('v2.layouts.app')

@section('content')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection
    <!-- Navbar -->
    @include('v2.components.navbar.sign')
    <!-- End Navbar -->

    <!-- Login -->
    <div class="user-form-area" style="margin-top: 100px">
        <div class="container-fluid pt-5">
            <div class="row m-0 d-flex justify-content-center">
                <div class="col-lg-6 p-0">
                    <div class="user-content">
                        @include('v2.components.social-auth')
                        <div class="top">
                            <form method="post" action="{{ route('v2.login') }}">
                                @csrf
                                <div class="form-group">
                                    @if (isset($errors))
                                        @error('email')
                                            <div class="text-center my-2 py-1 alert alert-danger" role="alert">
                                                Invalid Email Address or Password
                                            </div>
                                        @enderror
                                    @endif
                                    <label for="">Username or Email<b style="color: red" title="Required"> *</b></label>
                                    <input type="text" name="username" required="required" value="{{ old('username') }}" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    @if (isset($errors))
                                        @error('username')
                                        <div class="text-center my-2 py-1 alert alert-danger" role="alert">
                                            Invalid Username or Password
                                        </div>
                                    @enderror
                                    @endif
                                    <label for="">Password<b style="color: red" title="Required"> *</b></label>
                                    <input type="password" name="password" required="required" class="form-control" placeholder="Password">
                                </div>
                                <button type="submit" name="button" class="btn">{{ __('auth.login') }}</button>
                            </form>

                            <br>
                           <div class="login-para">
                                <h5><a href="{{ route('password.request') }}" class="orange">Forgot Password?</a></h5>
                            </div>   
                            <h5>Don't have an account? Register <a href="/join">here</a></h5>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Login -->

@endsection