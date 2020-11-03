@extends('v2.layouts.app')

@section('title', $title .' :: Emploi')

@section('content')
    <!-- Navbar -->
    @include('v2.components.jobseeker.navbar')
    <!-- End Navbar -->

    <!-- Jobs -->
    <div class="job-area-list dashboard-area mt-1 ptb-100">
        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-lg-3">
                    @include('v2.components.sidebar.jobseeker')
                </div>           

                    <div class="{{auth()->user() ? 'col-lg-9' : 'col-lg-12' }} jobs-form">                    
                      
                    <button class="btn btn-success"><a href="{{Route('v2.cv-review.create')}}"><span style="color: white"> CV Review</i></span></a></button>
                    @auth
                        <button class="btn btn-success"><a href="{{route('v2.self-assessment.create')}}"><span style="color: white">  Self Assessment</i></span></a></button>
                    @endauth
                    @guest
                        <button class="btn btn-success"><a href="#" data-toggle="modal" data-target="#selfAssessmentModal"><span style="color: white">  Self Assessment</i></span></a></button>
                    @endguest
         
                    <h3 class="text-center my-4">Get all the latest jobs in one place and apply.</h3>
                    <!-- Jobs -->
                    <div class="categories-area pt-2 pb-70">
                        <div class="container-fluid"> 
                            <div class="row">
                                @guest
                                <div class="col-lg-2">
                                    <h4>Filter By</h4>
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="index-2.html#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                            <i class="flaticon-placeholder"></i>
                                            My Location
                                            <i class="flaticon-right-arrow two"></i>
                                        </a>
                                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="index-2.html#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                            <i class="flaticon-resume"></i>
                                            My Industry
                                            <i class="flaticon-right-arrow two"></i>
                                        </a>
                                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="index-2.html#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                                            <i class="flaticon-pencil"></i>
                                            Skills
                                            <i class="flaticon-right-arrow two"></i>
                                        </a>
                                    </div>
                                </div>
                                @endguest
                                <div class="{{ auth()->user() ? 'col-lg-12' : 'col-lg-10'}}">
                                    <!-- FEATURED VACANCIES -->
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="col-12 col-lg-12">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <h4>Top Trending Vacancies</h4>
                                                        <ul>
                                                            @foreach($posts as $post)
                                                            @if($post->featured == 'true')
                                                            <li class="featured_links"><a href="/vacancies/{{$post->slug}}/" class="orange">{{  $post->getTitle() }}</a><br></li>                              
                                                            @endif
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                    <div class="col-md-5">
                                                        @include('components.ads.responsive')
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row justify-content-between">
                                        <div class="col-md-6">
                                            <div class="sorting-menu mt-3 float-left">
                                                <ul> 
                                                    <li class="filter" data-filter="all">All</li>
                                                    @if (auth()->user() || !empty(request()->parameters))
                                                        <li class="filter" data-filter=".recommended">Recommended</li>   
                                                    @else
                                                        <a href="#" class="mr-3" data-toggle="modal" data-target="#recommendedModal">
                                                            <li>
                                                            Recommended
                                                            </li>
                                                        </a>
                                                    @endif
                                                    <li class="filter" data-filter=".m">Saved</li>
                                                    <li class="filter" data-filter=".internships">Internships</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-4">                                              
                                            <a href=""></a>
                                            <a class="text-center float-right cmn-btn mb-4" data-toggle="collapse" href="#advancedFilter" role="button" aria-expanded="false" aria-controls="advancedFilter">
                                                Select Advanced Filters
                                                <i class='bx bx-filter'></i>
                                            </a>    
                                        </div>
                                    </div> 
                                    @include('v2.components.jobseeker.advanced-filter')

                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                            <div id="container" class="row">
                                                @forelse($posts as $post)
                                                    @include('v2.components.jobseeker.vacancy-card')
                                                @empty
                                                <div class="col-md-6">                                          
                                                    <p>No job posts found</p>
                                                </div>
                                                @endforelse
                                            </div>
                                            <div class="row justify-content-center">
                                            @if(isset($search))
                                            @else
                                            {{ $posts->links() }}
                                            @endif
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

    <!-- Featured -->
    @include('v2.components.featured-employers')                
    <!-- End Featured Employers -->

@endsection

@section('modal')
    @include('v2.components.modals.recommender-parameters')

    @include('v2.components.modals.self-assessment')
@endsection

@section('js')
    <script>
    </script>
@endsection
