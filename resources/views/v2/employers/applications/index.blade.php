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
                <div class="col-lg-2">
                    {{-- @include('v2.components.sidebar.employer') --}}               
                </div>           
                 <div class="col-lg-10 jobs-form">
                    <!-- Jobs -->
                    <div class="categories-area pt-2 pb-70">
                        <div class="container-fluid"> 
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="row my-4">
                                        <div class="col-md-12">
                                            <div class="sorting-menu mt-3 float-left">
                                                <ul> 
                                                    <li class="filter" data-filter="all">1.All Applications</li>
                                                    <li class="filter" data-filter=".recommended">2.Shortlisted</li>   
                                                    <li class="filter" data-filter=".saved">3.Manage Interviews</li>
                                                    <li class="filter" data-filter=".internships">4.Manage Referees</li>
                                                    <li class="filter" data-filter=".internships">5.Select Candidates</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                            <div id="container" class="row">   
                                                <?php  $kk=0; $shown = []; ?>   
                                                @forelse($post->featuredApplications as $a)
                                                    @include('v2.components.employer.candidate-card')
                                                    <?php $shown[] = $a->id; ?>
                                                @empty
                                                @endforelse
                                                                                
                                                @forelse($pool as $a)
                                                    @if(array_search($a->id, $shown) === false)
                                                        @include('v2.components.employer.candidate-card')
                                                    @endif
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


