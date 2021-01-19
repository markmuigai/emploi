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
                        <h3 class="text-center">Aptitude Test Generated for {{$post->title}}</h3>
                        <div class="card shadow">
                            <div class="card-body">
                                @foreach ($questions as $key => $question)
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
                                <button class="btn btn-success">
                                    Send Assessment
                                </button>
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



