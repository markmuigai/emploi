@extends('v2.layouts.app')

@section('content')
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
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Login -->

@endsection