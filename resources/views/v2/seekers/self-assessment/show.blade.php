@extends('v2.layouts.app')


@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
    <!-- Navbar -->
    @include('v2.components.jobseeker.navbar')
    <!-- End Navbar -->
        <!-- Resume -->
        <div class="person-details-area resume-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        Self Assessment
                    </div>
                </div>
            </div>
        </div>
@endsection