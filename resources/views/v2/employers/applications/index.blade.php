@extends('v2.layouts.app')

@section('title','Emploi :: '.$post->getTitle())

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
    @section('page_title', $post->title.' Candidates')

    <?php
    $last_rsi = [];
    ?>
    
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
                     @include('v2.components.employer.shortlisting.dashboard-cards')
                    <!-- Jobs -->
                    <div class="categories-area pb-70">
                        <div class="container-fluid"> 
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row mb-4">
                                        <div class="col-md-12">
                                            <div class="sorting-menu mt-3 float-left">
                                                <ul> 
                                                    <li class="filter" data-filter="all">1.All Applications ({{ count($post->applications) }})</li>

                                                    @if(Auth::user()->employer->isOnStawiPackage())
                                                    <a href="/v2/employers/applications/{{ $post->slug }}/shortlisted">
                                                        <li class="filter pl-2" data-filter="false">2.Shortlisted ({{ count($post->shortlisted) }})</li>   
                                                    </a>
                                                    @else
                                                    <a href="/checkout?product=stawi">
                                                        <li class="filter pl-2" data-toggle="tooltip" title="Purchase stawi to unlock this feature" >2.Shortlisted ({{ count($post->shortlisted) }})</li>   
                                                    </a>
                                                    @endif

                                                    @if(Auth::user()->employer->isOnStawiPackage())
                                                    <a href="{{route('v2.interviews.index', ['post' => $post])}}">
                                                        <li class="filter" data-filter="false">
                                                            3.Manage Interviews ({{ count($post->toInterview) }})
                                                        </li>
                                                    </a>
                                                    @else
                                                    <a href="/checkout?product=stawi">
                                                        <li class="filter pl-2" data-toggle="tooltip" title="Purchase stawi to unlock this feature" > 3.Manage Interviews ({{ count($post->toInterview) }}))</li>   
                                                    </a>
                                                    @endif

                                                    @if(Auth::user()->employer->isOnStawiPackage())
                                                    <a href="{{route('v2.referees.index', ['slug' => $post->slug])}}">
                                                        <li class="filter" data-filter="false">
                                                            4. Manage Referees
                                                        </li>
                                                    </a>
                                                    @else
                                                    <a href="/checkout?product=stawi">
                                                        <li class="filter pl-2" data-toggle="tooltip" title="Purchase stawi to unlock this feature" >4.Manage Referees</li>   
                                                    </a>
                                                    @endif

                                                    @if(Auth::user()->employer->isOnStawiPackage())
                                                    <a href="/v2/employers/applications/{{$post->slug}}/selection">
                                                        <li class="filter" data-filter="false">
                                                            5. Select Candidate
                                                        </li>
                                                    </a>
                                                    @else
                                                    <a href="/checkout?product=stawi">
                                                        <li class="filter pl-2" data-toggle="tooltip" title="Purchase stawi to unlock this feature" >5. Select Candidate</li>   
                                                    </a>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                            <div id="container" class="row">                                   
                                                @forelse($pool as $a)
                                                    @include('v2.components.employer.shortlisting.applicant-card')
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
                                                    {{ $pool->links() }}
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



