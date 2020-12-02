@extends('v2.layouts.app')

@section('title','Self Assessment :: Emploi')

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
                            <h4 class="text-center">My Self Assessment Results</h4><br>
                            @if(App\Performance::recentScore(request()->email) != NULL)
                                                
                            @guest
                                <div class="text-center">
                                    <p>
                                        <a href="/login" class="btn btn-orange">{{ __('auth.login') }}</a>
                                        or  
                                        <a href="/join" class="btn btn-orange-alt">Register</a>
                                        To view Your Results
                                    </p>
                                </div>                             
                            @endguest
                            @if(auth::user())
                                <div class="container shadow p-3 mb-5 bg-white rounded px-5">
                                    <div class="row d-flex justify-content-between">
                                        <div class="col-md-6">
                                            <h5>{{ auth::user()->name }}</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <h5>Score: {{ $score/$performances->count() *100 }}%</h5>
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
                                    @if (isset($perf->question->image))
                                        <div class="row mb-3">
                                            <img src="/storage/assessments/{{$perf->question->id}}" height="auto" width="400px" alt="">
                                            @if ($perf->correct == 0)
                                                <div class="col-md-4">
                                                    @php
                                                        $options = collect(['a','b','c','d']);
                                                    @endphp
                                                        Selected: {{$options->get($perf->choice_id)}}
                                                </div>
                                            @endif
                                            <div class="col-md-4">
                                                Correct choice: {{$perf->question->image->correct_value}}
                                            </div>
                                        </div>
                                    @else
                                        <div class="row mb-3">
                                            @if ($perf->correct == 0)
                                                <div class="col-md-4">
                                                    @if ($perf->choice_id == 0)
                                                        No answer given
                                                    @else
                                                        Selected: {{$perf->selectedChoice->value}}
                                                    @endif
                                                </div>
                                            @endif
                                            <div class="col-md-4">
                                                Correct choice: {{$perf->question->correctChoice()->value}}
                                            </div>
                                        </div>
                                    @endif
                                    @endforeach
                                </div>
                            @endif
                            @else
                            <div class="container shadow p-3 mb-5 bg-white rounded px-5">
                                <div class="text-center"><p>No assessment found. Click the link below to do an assessment which will boost your chances of landing your dream job.</p>
                                    <button class="btn btn-success"><a href="{{route('v2.self-assessment.create')}}"><span style="color: white">  Self Assessment</i></span></a></button>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="container-fluid seeker-services px-5">
                            <h3 class="orange text-center">Why You Need Self Assessment</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card shadow rounded mb-2">
                                        <div class="card-body text-center">
                                            <i class="flaticon-verify"></i>
                                            <h6>Increase your job score ranking</h6><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card shadow rounded mb-2">
                                        <div class="card-body text-center">
                                               <i class="flaticon-verify"></i>    
                                               <h6>Highlight your key competencies</h6><br>
                                            </div>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card shadow rounded mb-2">
                                        <div class="card-body text-center">
                                            <i class="flaticon-verify"></i>
                                            <h6>Instant feedback and customized recommendations</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection