@extends('v2.layouts.app')

@section('title','Emploi :: '.$post->getTitle())

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
    @section('page_title', $post->title.' Candidates')
    
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
                    <!-- Jobs -->
                    <div class="categories-area pb-70">
                        <a href="/v2/employers/applications/{{ $post->slug }}" class="btn btn-primary rounded-pill mb-3">
                            <i class='bx bx-left-arrow-alt'></i>Back
                         </a>
                        <h3 class="text-center">{{$post->title}} Assessment Management</h3>
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-personality-tab" data-toggle="tab" href="#nav-personality" role="tab" aria-controls="nav-personality" aria-selected="true">
                                    <h5>
                                        Personality Test
                                    </h5>
                                </a>
                                <a class="nav-item nav-link" id="nav-aptitude-tab" data-toggle="tab" href="#nav-aptitude" role="tab" aria-controls="nav-aptitude" aria-selected="false">
                                    <h5>
                                        Aptitude Test
                                    </h5>
                                </a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade border p-4 border-top-0 show active" id="nav-personality" role="tabpanel" aria-labelledby="nav-personality-tab">
                                @if ($post->questions->isNotEmpty())
                                    <a href="{{route('v2.employers.assessments.index', ['slug' => $post->slug, 'type' =>'personality'])}}" class="btn btn-success mb-3">
                                        Assessment Results
                                    </a>
                                @endif
                                @foreach ($personalityQuestions as $key => $question)
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span>
                                                <strong>{{($key+1).') '.$question->title}} </strong>
                                            </span>
                                            <ul class="list-group my-4 list-group-horizontal">
                                                @foreach ($question->choices as $choice)
                                                    <li class="list-group-item">
                                                        {{$choice->value}}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                                <a href="{{route('v2.applications.personality-test.send' , ['id' => $post->id])}}" class="btn btn-success">Send Personality Test</a>
                            </div>
                            <div class="tab-pane fade border p-4 border-top-0" id="nav-aptitude" role="tabpanel" aria-labelledby="nav-aptitude-tab">
                                @if ($post->questions->isNotEmpty())
                                    <a href="{{route('v2.employers.assessments.index', ['slug' => $post->slug, 'type' =>'aptitude'])}}" class="btn btn-success mb-3">
                                        Assessment Results
                                    </a>
                                @endif
                                @foreach ($AptitudeQuestions as $key => $question)
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span>
                                                <strong>{{($key+1).') '.$question->title}} </strong>
                                            </span>
                                            <ul class="list-group my-4 list-group-horizontal">
                                                @foreach ($question->choices as $choice)
                                                    <li class="list-group-item {{$choice->isCorrect() == 1 ? 'text-success' : ''}}">
                                                        {{$choice->value}}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    @if (isset($question->image))
                                        <div class="row mb-3">
                                            <img src="/storage/assessments/{{$question->id}}" height="auto" width="400px" alt="">
                                        </div>
                                        <ul class="list-group my-4 list-group-horizontal">
                                            @foreach ($question->image->choices() as $choice)
                                                <li class="list-group-item {{$question->image->correct_value == $choice ? 'text-success' : ''}}">
                                                    {{$choice}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        @if(Session::has('message'))
                            <p class="alert alert-info">{{ Session::get('message') }}</p>
                        @endif
                    </div>
                    <!-- End Jobs -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Jobs -->
@endsection



