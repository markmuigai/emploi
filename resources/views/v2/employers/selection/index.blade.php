@extends('v2.layouts.app')

@section('title','Emploi :: '.$post->getTitle())

@section('content')
@section('page_title', $post->title.' Candidates')
    <?php
    $last_rsi = [];
    ?>
    
    <!-- Navbar -->
    @include('v2.components.jobseeker.navbar')
    <!-- End Navbar -->

    <style>
        .banner{
            background: purple;
            height: 10vh;
            display: flex;
            align-items: center
        }

        .banner a{
            text-decoration: none;
            transition: 2s;
        }

        .banner h5{
            color: #fff;
            font-weight: 900;
            text-align: center;
            margin: 0;
        }
    </style>

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
                                                    <a href="/v2/employers/applications/{{ $post->slug }}">
                                                        <li class="filter" data-filter="false">
                                                            1.All Applications
                                                        </li>
                                                    </a>
                                                    <a href="/v2/employers/applications/{{ $post->slug }}/shortlisted">
                                                        <li class="filter pl-2" data-filter="shortlisted">2.Shortlisted</li>   
                                                    </a>
                                                    <a href="{{route('v2.interviews.index', ['slug' => $post->slug])}}">
                                                        <li class="filter" data-filter="false">
                                                            3.Manage Interviews
                                                        </li>
                                                    </a>
                                                    <a href="{{route('v2.referees.index', ['slug' => $post->slug])}}">
                                                        <li class="filter" data-filter="false">
                                                            4. Manage Referees
                                                        </li>
                                                    </a>
                                                    <li class="filter" data-filter="all">5. Select Candidate</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                            <div id="container" class="row">   
                                                <?php  $kk=0;?>     
                                                @forelse($pool as $a)
                                                    @include('v2.components.employer.shortlisting.selected-card')
                                                @empty
                                                    <div class="col-md-8 justify-content-center">
                                                        <div class="card shadow mb-4">
                                                            <div class="card-body">
                                                                <h5 class="text-center">
                                                                    No applicants have been invited to an interview
                                                                </h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforelse
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


