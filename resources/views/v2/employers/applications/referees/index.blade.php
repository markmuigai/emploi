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
                    <h3 class="text-center">Manage applicants in different stages of the hiring process</h3>
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
                                                    <li class="filter" data-filter="false">
                                                        2. Shortlisted
                                                    </li>   
                                                    <a href="{{route('v2.interviews.index', ['slug' => $post->slug])}}">
                                                        <li class="filter" data-filter="false">
                                                            3.Manage Interviews
                                                        </li>
                                                    </a>

                                                    <a href="{{route('v2.referees.index', ['slug' => $post->slug])}}">
                                                        <li class="filter" data-filter="all">
                                                            4. Manage Referees
                                                        </li>
                                                    </a>

                                                    <a href="/v2/employers/applications/{{$post->slug}}/close">
                                                        <li class="filter" data-filter="false">
                                                            5. Select Candidate
                                                        </li>
                                                    </a>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                            <div id="container" class="row">   
                                                <?php  $kk=0; ?>   
                                                                                
                                                @forelse($pool as $a)
                                                <div class="col-sm-6 col-lg-4 mix saved">
                                                    <div class="cat-item">
                                                        <span id="vacancies-image">
                                                            <a href="/vacancies/{{ $a->slug }}">
                                                                <img src="{{ asset($a->user->getPublicAvatarUrl()) }}" alt="{{ $a->user->name }}">
                                                            </a>
                                                        </span>
                                                        <h3>
                                                            <a href="/employers/browse/{{ $a->user->username }}" target="_blank">{{ $a->user->name }}</a>
                                                        </h3>
                                                        <div class="row">
                                                            <div class="col-md-7">
                                                                @if($a->user->seeker->featured > 0)
                                                                <span class="badge badge-pill badge-success mx-1">
                                                                    <i class="bx bx-star"> </i>Featured
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <span>
                                                            Applied {{ $a->created_at->diffForHumans() }}
                                                        </span>
                                                        <div class="row my-2">
                                                            <a class="btn btn-success rounded-pill" href="/v2/employers/applications/{{ $a->post->slug }}/{{ $a->id }}/rsi/referees">Manage Referees</a>                                                           
                                                        </div>
                                                        <a class="link" href="index-2.html#">
                                                            <i class="flaticon-right-arrow"></i>
                                                        </a>
                                                    </div>
                                                </div>
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


