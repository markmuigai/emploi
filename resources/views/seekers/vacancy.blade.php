@extends('layouts.dashboard-layout')

@section('title','Emploi :: Dashboard')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', $post->title )
<!-- NAV-TABS -->
<ul class="nav nav-tabs" id="jobDetails" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="job-description-tab" data-toggle="tab" href="#job-description" role="tab" aria-controls="job-description" aria-selected="true">Job Description</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="shortlist-tab" data-toggle="tab" href="#shortlist" role="tab" aria-controls="shortlist" aria-selected="false">How to Apply</a>
    </li>
</ul>
<div class="row">
    <div class="col-lg-9 col-md-8 col-12">
        <!-- NAV-TAB CONTENT -->
        <div class="tab-content pt-2" id="jobDetailsContent">
            <!-- ALL JOBS -->
            <div class="tab-pane fade show active" id="job-description" role="tabpanel" aria-labelledby="job-description-tab">
                <!-- JOB CARD -->
                <div class="card py-2 mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-5 col-md-12 d-flex justify-content-between align-items-center">
                                <p>
                                    <i class="fas fa-share-alt"></i> Share:
                                </p>
                                <a href="{{ $post->shareFacebookLink }}" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="{{ $post->shareTwitterLink }}" target="_blank">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="{{ $post->shareLinkedinLink }}" target="_blank">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            </div>
                            <div class="col-lg-7 col-md-12 text-right">

                            </div>
                        </div>
                        <hr>
                        <div class="row pb-3">
                            <div class="col-12 col-md-6 col-lg-7">
                                <h5>{{ $post->title }} <span class="badge badge-light">{{ $post->positions }} Positions</span></h5>
                                <a href="/companies/{{ $post->company->name }}">{{ $post->company->name }}</a>
                                <p>
                                    <i class="fas fa-map-marker-alt orange"></i>
                                    {{ $post->location->name }}, {{ $post->location->country->name }}
                                </p>
                                <p>
                                    <span class="badge {{ $post->vacancyType->badge }}">{{ $post->vacancyType->name }}</span>
                                </p>

                            </div>
                            <div class="col-12 col-md-6 col-lg-5 d-flex flex-column justify-content-between text-right">

                                <p>
                                    <strong>
                                        @if(isset(Auth::user()->id))
                                        {{ $post->monthlySalary() }} {{ $post->monthly_salary == 0 ? '' : 'p.m.' }}
                                        @else
                                        Login to view salary
                                        @endif
                                        
                                    </strong>
                                </p>
                                <p>
                                    <i class="orange far fa-calendar-check"></i> {{ $post->deadline }}
                                    <br>
                                    Apply within <?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($post->deadline))->diffForHumans() ?>
                                </p>
                            </div>
                        </div>
                        <!-- ABOUT THE COMPANY -->
                        <h5 class="pt-3 pb-2">About {{ isset(Auth::user()->id) ? $post->company->name : ' the Company' }}</h5>
                        <p><?php echo $post->company->about; ?></p>
                        <!-- JOB DESCRIPTION -->
                        <h5 class="pt-3 pb-2">Job Description</h5>
                        <div>
                            <?php echo $post->responsibilities; ?>
                        </div>
                    </div>
                </div>
                <!-- END OF JOB CARD -->
            </div>
            <!-- END OF ALL JOBS -->
            <!-- ACTIVE JOBS -->
            <div class="tab-pane fade" id="shortlist" role="tabpanel" aria-labelledby="shortlist-tab">

                <h5>Application Instructions</h5>

                @guest
                    <p>
                        <a href="/login" class="btn btn-link">Login</a> or <a href="/register" class="btn btn-success">create free account</a> to apply for this position.
                    </p>
                @else

                    @if(Auth::user()->role == 'seeker')
                        @if( $post->how_to_apply )
                        <div>
                            <?php echo $post->how_to_apply; ?>
                        </div>
                        @else
                            <p>
                                Follow the link below, submit your cover letter. Your current resume would be attached automatically. <br><br>
                                <a href="/vacancies/{{ $post->slug }}/apply" class="btn btn-success">Submit Application</a>

                            </p>
                        @endif
                    @else
                    <p>
                        Only job seekers can apply for this position.
                    </p>
                    @endif

                @endguest

            </div>
            <!-- END OF ACTIVE JOBS -->


        </div>
    </div>
</div>

@endsection
