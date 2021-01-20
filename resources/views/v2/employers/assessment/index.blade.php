@extends('v2.layouts.app')

@section('title','Emploi :: '.$post->getTitle())

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
    @section('page_title', $post->title.' Candidates')
    
    <!-- Navbar -->
    @include('v2.components.jobseeker.navbar')
    <!-- End Navbar -->

    <!-- Jobs -->
    <div class="job-area-list dashboard-area mt-1 ptb-100">
        <div class="container-fluid px-2">
            <div class="row">
                <div class="col-lg-2 pt-5">
                    @include('v2.components.sidebar.employer')               
                </div>           
                 <div class="col-lg-10 jobs-form">
                    <!-- Jobs -->
                    <div class="categories-area pb-70">
                        <a href="{{ url()->previous() }}" class="btn btn-primary rounded-pill mb-3">
                            <i class='bx bx-left-arrow-alt'></i>Back
                         </a>
                        <h3 class="text-center">Aptitude Test Resuls for {{$post->title}}</h3>
                        @include('v2.components.tables.employer.assessments')
                    </div>
                    <!-- End Jobs -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Jobs -->
@endsection



