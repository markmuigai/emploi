@extends('v2.layouts.app')

@section('title','Self Assessment :: Emploi')

@section('content')
    <!-- Navbar -->
    @include('v2.components.jobseeker.navbar')    
    <!-- End Navbar -->
    <div class="assessment-section pt-100 pb-70 px-4">
        <h3 class="text-center my-4">Self Assessment</h3>
        <div class="row justify-content-center">
            <div class="col-md-8 col-sm-12 card shadow p-3 mb-5 px-5">
                <div class="container bg-white rounded px-5">
                 <p class="danger">Please note that you will be legible for another assessment after 1 week since your last assessment.</p>                 
                </div>
                <div class="text-center">
                    <a href="/v2/self-assessment?email={{ $email }}" class="btn btn-primary">                       
                        Latest Assessment Result                  
                    </a>
                </div>       
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection