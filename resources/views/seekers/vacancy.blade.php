@extends('layouts.dashboard-layout')

@section('title','Emploi :: '.$post->title )

@section('description')
{{ $post->brief }}
@endsection

@section('meta-include')
<meta property="og:url"           content="{{ url('/vacancies/'.$post->slug) }}" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="{{ $post->title }}" />
<meta property="og:description"   content="{{ $post->brief }}" />
<meta property="og:image"         content="{{ asset($post->imageUrl) }}" />
<meta property="og:image:width"   content="906" />
<meta property="og:image:height"  content="518" />
@endsection

@section('content')
@section('page_title', $post->title )
<!-- NAV-TABS -->
<ul class="nav nav-tabs" id="jobDetails" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="job-description-tab" data-toggle="tab" href="#job-description" role="tab" aria-controls="job-description" aria-selected="true">Job Description</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="apply-tab" data-toggle="tab" href="#apply" role="tab" aria-controls="apply" aria-selected="false">How to Apply</a>
    </li>
</ul>
<div class="row">
    <div class="col-lg-9 col-md-12">
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
                                @guest
                                @else
                                    @if(Auth::user()->email == 'jobs@emploi.co')
                                    <a href="/employers/applications/{{ $post->slug }}/share" target="_blank">[ ADMIN SHARE ]</a>
                                    @endif

                                @endguest
                            </div>
                        </div>
                        <hr>
                        <div class="row pb-3">
                            <div class="col-12 col-md-6 col-lg-7">
                                <h5>{{ $post->title }} <span class="badge badge-secondary">{{ $post->positions }} Positions</span></h5>
                                <a href="/companies/{{ $post->company->name }}">{{ $post->company->name }}</a>
                                <p>
                                    <i class="fas fa-map-marker-alt orange"></i>
                                    {{ $post->location->name }}, {{ $post->location->country->name }}
                                </p>
                            </div>
                            <div class="col-12 col-md-6 col-lg-5 d-flex flex-column justify-content-between text-sm-left text-md-right">
                                <p>
                                    <strong>
                                        @if(isset(Auth::user()->id))
                                        {{ $post->monthlySalary() }} {{ $post->monthly_salary == 0 ? '' : 'p.m.' }}
                                        @else
                                        <a href="/login" class="orange">Login </a>
                                        to view salary
                                        @endif
                                    </strong>
                                    <br>
                                    
                                    <a href="/vacancies/{{ $post->vacancyType->slug  }}" title="View {{ $post->vacancyType->name }} jobs">
                                        <span class="badge {{ $post->vacancyType->badge }}">{{ $post->vacancyType->name }}</span>
                                    </a>
                                    <br>
                                    <a href="/vacancies/{{ $post->industry->slug }}" title="View {{ $post->industry->name }} jobs">
                                        <i class="fa fa-briefcase"></i> {{ $post->industry->name }}
                                    </a>
                                    <br>

                                    <span>Posted <span style="text-decoration: underline;">{{ $post->since }}</span></span>
                                </p>
                                
                            </div>
                        </div>
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
            <div class="tab-pane fade" id="apply" role="tabpanel" aria-labelledby="apply-tab">
                <div class="card py-2 mb-4">
                    <div class="card-body">
                        <h5>Application Instructions</h5>

                        @guest
                        <p>
                            <a href="/login?redirectToPost={{ $post->slug }}" class="btn btn-orange-alt">Login</a> or <a href="/register?redirectToPost={{ $post->slug }}" class="btn btn-orange">Create Free Account</a> to apply for this position.
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
                            <a href="/vacancies/{{ $post->slug }}/apply" class="btn btn-orange">Submit Application</a>

                        </p>
                        @endif
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
    <div class="col-lg-3 col-8 pt-2">
        <div class="card">
            <div class="card-body text-center">
                <img src="{{ asset($post->company->logoUrl) }}" alt="{{ $post->company->name  }}" class="circle-img">
                <h5>
                    <a href="/companies/{{ $post->company->name }}">{{ $post->company->name }}</a>
                </h5>
                <p><i class="fas fa-map-marker-alt orange"></i>
                    {{ $post->company->location->name.', '.$post->company->location->country->name }}
                </p>
                <p>{{ $post->company->staff }}</p>
            </div>
        </div>
    </div>
</div>

@endsection
