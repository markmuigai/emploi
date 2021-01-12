@extends('v2.layouts.app')

@section('title','Self Assessment :: Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
    <!-- Navbar -->
    @include('v2.components.jobseeker.navbar')
    <!-- End Navbar -->
        <!-- Resume -->
        <div class="ptb-100 px-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <a href="{{ url()->previous() }}" class="btn btn-primary rounded-pill mb-3">
                            <i class='bx bx-left-arrow-alt'></i>Back
                         </a>
                        <h4 class="text-center">
                            Put personality test questions here
                        </h4>
                    </div>
                </div>
            </div>
        </div>
@endsection