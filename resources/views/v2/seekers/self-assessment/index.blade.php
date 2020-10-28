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
                            <div class="row justify-content-end">
                                <div class="col-md-4">
                                    <a class="text-center float-right cmn-btn mb-4" href="#" role="button">
                                        View Previous Scores
                                        <i class='bx bx-filter'></i>
                                    </a>                                  
                                </div>
                            </div>
                            <div class="container shadow p-3 mb-5 bg-white rounded px-5">
                                <div class="row d-flex justify-content-between">
                                    <div class="col-md-4">
                                        <h5>Your Latest Assessement</h5>
                                    </div>
                                    <div class="col-md-4">
                                        <h5>Score: {{$score}}/{{$performances->count()}}</h5>
                                    </div>
                                </div>
                                @foreach ($performances as $key => $perf)
                                    <div class="row">
                                        <div class="col-md-12">
                                            <span class="{{$perf->correct == 1 ? 'text-success' : 'text-danger'}}">
                                                <strong>{{($key+1).') '.$perf->question->title}}
                                                    @if ($perf->correct == 1)
                                                    <span style="font-size: 25px">
                                                        <i class='bx bx-check text-success'></i>
                                                    </span>
                                                    @else
                                                    <span style="font-size: 25px">
                                                        <i class='bx bx-x text-danger'></i>
                                                    </span>
                                                    @endif</strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        @if ($perf->correct == 0)
                                        <div class="col-md-4">
                                            Selected: {{$perf->selectedChoice->value}}
                                        </div>
                                        @endif
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