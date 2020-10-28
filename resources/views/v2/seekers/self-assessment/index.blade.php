@extends('v2.layouts.app')

@section('content')
    <!-- Navbar -->
    @include('v2.components.jobseeker.navbar')
    <!-- End Navbar -->
        <!-- Resume -->
        <div class="assessment-results ptb-100 px-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="container p-4">
                            <h4 class="text-center">My Self Assessment Results</h4>
                            <div class="container shadow p-3 mb-5 bg-white rounded px-5">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-md-4">
                                        <h5>Assessment 1</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <h5>Score: {{$score}}/{{$performances->count()}}</h5>
                                    </div>
                                </div>
                                @foreach ($performances as $key => $perf)
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span><strong>{{($key+1).') '.$perf->question->title}}</strong></span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-10">
                                            @foreach ($perf->question->choices as $choice)
                                            <span class="mr-1">{{$choice->value}}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            Selected: {{$perf->selectedChoice->value}}
                                        </div>
                                        <div class="col-md-4">
                                            Correct choice: {{$perf->question->correctChoice()->value}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection