@extends('v2.layouts.app')

@section('content')
    <!-- Navbar -->
    @include('v2.components.navbar.sign')
    <!-- End Navbar -->

    <!-- Select registration -->
    <div class="user-form-area" style="margin-top: 100px">
        <div class="container-fluid pt-2">
            <div class="row m-0 d-flex justify-content-center">
                <div class="col-lg-6 p-0">
                    <div class="user-content">
                        @include('v2.components.social-auth')
                        <div class="top">
                            <p class="text-center">Welcome to Emploi, an efficient platform to manage recruitments and find work for a successful career.</p>
                            <div class="row acc-links">
       
                                <a href="/register{{ isset($name) ? '?email='.$email.'&name='.$name : '' }}" class="col-md-6 col-12">
                                    <img src="/images/seeker-join.png" class="w-100 py-3" alt="Job Seeker Registration">
                                    <h4>Job Seeker Registration</h4>
                                </a>
                                 <a href="/employers/register{{ isset($name) ? '?email='.$email.'&name='.$name : '' }}" class="col-md-6 col-12">
                                    <img src="/images/employer-join.png" class="w-100 py-3" alt="Employer Registration">
                                    <h4>Company Registration</h4>
                                </a>
                            </div>
                            @if(!isset($name))
                            <div class="text-center">
                                <p>Already have an account?</p>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-md-5">
                                        <a href="/v2/login" class="btn btn-orange">Log in here</a>
                                    </div>
                                    <div class="col-md-1">
                                        <p>or</p>
                                    </div>
                                    <div class="col-md-5">
                                        <a href="/contact" class="btn btn-orange-alt">Contact Us</a>
                                    </div>
                                </div>

                            </div>
                            @else
                            <div class="text-center">
                                <p>
                                    Need help registering? <br> <a href="/contact{{ isset($name) ? '?email='.$email.'&name='.$name : '' }}" class="btn btn-orange-alt">Contact Us</a>
                                </p>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Select registration -->

@endsection