@extends('v2.layouts.app')

@section('title','Employer Dashboard :: Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
    @section('page_title', 'Self Assessment Results ')
    
    <!-- Navbar -->
    @include('v2.components.jobseeker.navbar')
    <!-- End Navbar -->

    <div class="job-area-list dashboard-area mt-1 ptb-100">
        <div class="container-fluid px-2">
            <div class="row">
                <div class="col-lg-2 pt-3">
                    @include('v2.components.sidebar.employer')               
                </div>           
                 <div class="col-lg-10 jobs-form">
                    <div class="categories-area">
                        <div class="container-fluid mb-5">
                            <h3 class="my-3 text-center">Employer Dashboard</h3>
                            <div class="row employer-stats">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="mb-2">
                                                Recent Applications
                                            </h4>
                                            <div class="activity-feed">
                                                @forelse($recentApplications as $application)
                                                    <div class="feed-item">
                                                        <div class="date">{{ CarbonParse($application->created_at)->diffForHumans()}}</div>
                                                        <a href="/v2/employers/browse/{{ $application->username }}">
                                                            {{ $application->name }}
                                                        </a> applied for 
                                                        <a href="/v2/employers/applications/{{ $application->slug }}">{{ $application->title }}</a> job 
                                                    </div>
                                                    @empty
                                                        <a href="/employers/jobs" class="btn btn-primary btn-sm btn-success float-right">
                                                        View All
                                                        </a>
                                                    <li>No Applications have been received</li>
                                                    @endforelse
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    @if(Auth::user()->employer->jobApplicationsCount() !=0 )
                                        <div class="card card-stats mb-4">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <h4 class="mb-1">Applicants</h4>
                                                        <span class="h2 font-weight-bold mb-0">{{ Auth::user()->employer->jobApplicationsCount() }}</span>
                                                    </div>
                                                    <div class="col-auto">
                                                        <a href="/employers/jobs">
                                                            <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                                                <i class='bx bxs-user-detail'></i>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-stats mb-4">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col">
                                                        <h4 class="mb-1">My Jobs</h4>
                                                        <span class="h2 font-weight-bold mb-0">{{ Auth::user()->employer->jobPostsCount() }}</span>
                                                    </div>
                                                    <div class="col-auto">
                                                        <a href="/employers/jobs">
                                                            <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                                                <i class='bx bx-briefcase-alt'></i>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                
                                    <a class="cmn-btn mt-1" href="/post-a-job">
                                        Post a job
                                        <i class="bx bx-plus"></i>
                                    </a> 
                                    <a class="cmn-btn mt-1" href="/employers/rate-card">
                                        Our Packages
                                        <i class='bx bxs-package'></i>
                                    </a>                                                          
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Candidate -->
                    <div class="candidate-area pb-100">
                        <div class="container-fluid">
                            <h4 class="mb-4 text-center">Featured Job Seekers</h4>
                            <div class="row">
                                @foreach ($featuredSeekers as $seeker)
                                <div class="col-lg-4">
                                    <div class="candidate-item two">
                                        <div class="left">
                                            <h3>
                                                @if(Auth::user()->employer->isOnStawiPackage())
                                                    <a href="/employers/browse/{{$seeker->user->username}}">{{ $seeker->user->name }}</a>
                                                @else
                                                    <a href="/employers/browse/{{$seeker->user->username}}">{{ $seeker->user->seeker->public_name }}</a>
                                                @endif
                                            </h3>
                                            <span>{{$seeker->industry->name}}</span>
                                            <ul class="experience">
                                                <li>Experience: <span>{{$seeker->years_experience}} years</span></li>
                                            </ul>
                                        </div>
                                        <img src="{{ asset($seeker->user->getPublicAvatarUrl()) }}" alt="{{ $seeker->user->username }}">
                                    </div>
                                </div>
                                @endforeach                             
                            </div>
                            <div class="text-center">
                                {{ $featuredSeekers->links() }}
                            </div>

                  <!--           <div class="pagination-area">
                                <ul>
                                    <li>
                                        <a href="candidates.html#">Prev</a>
                                    </li>
                                    <li>
                                        <a href="candidates.html#">1</a>
                                    </li>
                                    <li>
                                        <a href="candidates.html#">2</a>
                                    </li>
                                    <li>
                                        <a href="candidates.html#">3</a>
                                    </li>
                                    <li>
                                        <a href="candidates.html#">Next</a>
                                    </li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                    <!-- End Candidate -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $("#inputRating").change(function() {
            this.form.submit();
        });
    </script>
@endsection


