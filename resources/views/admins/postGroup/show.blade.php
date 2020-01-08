@extends('layouts.dashboard-layout')

@section('title','Emploi :: '.$postGroup->getTitle() )

@section('description')
{{ $postGroup->description }}
@endsection

@section('meta-include')
<meta property="og:url"           content="{{ url('/vacancies/'.$postGroup->slug) }}/" />
<meta property="og:title"         content="{{ $postGroup->title }}" />
<meta property="og:description"   content="{{ $postGroup->description }}" />
@endsection

@section('content')
@section('page_title', $postGroup->getTitle() )
<?php  $pg = $postGroup; ?>
<!-- NAV-TABS -->
<ul class="nav nav-tabs" id="jobDetails" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="job-description-tab" data-toggle="tab" href="#job-description" role="tab" aria-controls="job-description" aria-selected="true">Description</a>
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
                                <a href="{{ $pg->shareFacebookLink }}" target="_blank">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="{{ $pg->shareTwitterLink }}" target="_blank">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="{{ $pg->shareLinkedinLink }}" target="_blank">
                                    <i class="fab fa-linkedin"></i>
                                </a>
                            </div>
                            <div class="col-lg-7 col-md-12 text-right">
                                
                            </div>
                        </div>
                        <hr>
                        <div class="row pb-3">
                            <div class="col-12 col-md-6 col-lg-7">
                                <h5>
                                    {{ $pg->getTitle() }} 
                                     <br>
                                    <span class="badge badge-secondary">{{ count($pg->postGroupJobs) }} Vacanc{{ count($pg->postGroupJobs) == 1 ? 'y' : 'ies' }}</span>
                                </h5>
                                
                            </div>
                            <div class="col-12 col-md-6 col-lg-5 d-flex flex-column justify-content-between text-sm-left text-md-right">
                                <p>

                                    <span>Posted <span style="text-decoration: underline;"><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($pg->created_at))->diffForHumans() ?></span></span>
                                </p>
                                
                            </div>
                        </div>
                        <hr>
                        <!-- JOB DESCRIPTION -->
                        <h5 class="pt-3 pb-2">Description</h5>
                        <div>
                            <?php echo $pg->description; ?>
                        </div>

                        <hr>
                        <h5 class="pt-3 pb-2">Vacancies</h5>
                        @forelse($pg->postGroupJobs as $pgs)

                        <div>
                            <a href="/vacancies/{{ $pgs->post->slug }}" style="font-weight: bold;">{{ $pgs->post->getTitle() }}</a>
                            <br>
                            <br>
                            <?php 
                                $shortRes = $pgs->post->responsibilities;
                                $len = strlen($shortRes);

                                print substr($shortRes, 0, $len > 250 ? 250 : $len ); 
                            ?>
                            <hr>
                        </div>

                        @empty

                        <div>
                            No vacancies have been posted under {{ $pg->getTitle() }}
                        </div>

                        @endforelse
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
                            <a href="/login?redirectToPost={{ $pg->slug }}" class="btn btn-orange-alt">Login</a> or <a href="/register?redirectToPost={{ $pg->slug }}" class="btn btn-orange">Create Free Account</a> to apply for this position.
                        </p>
                        @else

                        <p>
                            <?php  print $pg->how_to_apply; ?>
                        </p>

                            

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
                
                @if(Auth::user()->role == 'admin')
                <a href="/admin/job-post-groups/{{ $pg->id }}/edit">edit</a>
                @else
                <a href="/vacancies">Other Vacancies</a>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
