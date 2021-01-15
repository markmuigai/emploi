@extends('v2.layouts.app')

@section('title','Browse Jobseekrs :: Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
    @section('page_title', 'Browse Jobseekers')
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
                    <h3 class="text-center my-2">Browse all Candidates </h3>
                    @include('v2.components.employer.browse.filter') 
                    <!-- Jobs -->
                    <div class="categories-area pb-70">
                        <div class="container-fluid"> 
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                            <div id="container" class="row">                                
                                                @forelse($seekers as $s)
                                                    @include('v2.components.employer.seeker-card')
                                                @empty
                                                    <div class="card mb-4">
                                                        <div class="card-body">
                                                            <p class="text-center">
                                                                No applications have been found
                                                            </p>
                                                        </div>
                                                    </div>
                                                @endforelse
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    {{ $seekers->links() }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Jobs -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Jobs -->
@endsection



