@extends('layouts.dashboard-layout')

@section('title','Emploi :: '.$post->title )

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', $post->title )
<!-- NAV-TABS -->
<style type="text/css">
    strong {
        display: block;
    }
</style>
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
                                <h5>{{ $post->title }}</h5>
                                <p>
                                    <i class="fas fa-map-marker-alt orange"></i>
                                     {{ $post->country->name }}
                                </p>

                            </div>
                            <div class="col-12 col-md-6 col-lg-5 d-flex flex-column justify-content-between text-right">

                                
                                <p>
                                    <i class="orange far fa-calendar-check"></i> Posted <?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() ?>
                                </p>
                            </div>
                        </div>
                        <!-- JOB DESCRIPTION -->
                        <h5 class="pt-3 pb-2">Job Description</h5>
                        <div>
                            <?php echo $post->contents; ?>
                        </div>
                    </div>
                </div>
                <!-- END OF JOB CARD -->
            </div>
            <!-- END OF ALL JOBS -->
            <!-- ACTIVE JOBS -->
            <div class="tab-pane fade" id="apply" role="tabpanel" aria-labelledby="apply-tab">
                <div class="card py-2 mb-4">
                    <div class="card-body">
                    <h5>Application Instructions</h5>

                    @guest
                        <p>
                            <a href="/login?redirectToPost={{ $post->slug }}" class="btn btn-link">{{ __('auth.login') }}</a> or <a href="/register?redirectToPost={{ $post->slug }}" class="btn btn-success">create free account</a> to apply for this position.
                        </p>
                    @else

                        @if(Auth::user()->role == 'seeker')
                            <p>
                                Application instructions have been included in the job description.

                            </p>
                        @else
                        <p>
                            Only job seekers can apply for this position.
                        </p>
                        @endif

                    @endguest
                    </div>
                </div>
            </div>
            <!-- END OF ACTIVE JOBS -->


        </div>
    </div>
</div>

@endsection
