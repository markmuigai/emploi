@extends('layouts.dashboard-layout')

@section('title','Emploi ::  Assessments')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Assessments')
@include('components.ads.responsive')
<div class="row mb-4">
    <div class="col-lg-6 col-md-6 col-12">
        <h4>Email</h4>
    </div>
    <div class="col-lg-6 col-md-6 col-12">
        <h4>Score</h4>
    </div>
    @forelse($perf as $p)
    <?php 
     $score = App\Performance::LatestAssessment($p->email)->where('correct',1)->count();
     $performance = App\Performance::LatestAssessment($p->email);
    ?>
    <div class="col-lg-6 col-md-6 col-12">
        <div class="card">      
            <div class="card-body text-center">
                <a href="/v2/self-assessment?email={{ $p->email }}">
                {{ $p->email }}
                </a>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6 col-12">
        <div class="card">  
            <div class="card-body text-center">
            {{ $score }}/{{$performance->count()}}
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-12 col-12">
        @include('components.ads.responsive')
    </div>

    @empty
    <div class="col-12">
      <div class="card">
        <div class="card-body text-center">
            <p>
                No Assessment Found
            </p>
        </div>
    </div>
  </div>
    @endforelse
</div>

<div class="text-center">
<!--   to add paginator -->
</div>
@endsection
