@extends('layouts.dashboard-layout')

@section('title','Emploi :: My Applications')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'My Applications')

@if(count($user->applications) > 0)
<h5>{{ count($user->applications) }} applications</h5>
    @forelse($user->applications as $app)
    <div class="col-lg-12">
        <div class="card my-2">
            <div class="card-body">
                <h4>
                    {{ $app->post->title }}

                </h4>
                <h6 class="orange">
                  <a href="/companies/{{ $app->post->company->name }}">
                    {{ $app->post->company->name }}
                  </a>
                </h6>
                <p><strong>Applied on: </strong>{{ $app->created_at }}</p>
                <div class="row align-items-center">
                    <div class="col-6">
                        <p>{{ $app->post->monthlySalary() }}</p>
                        @if($app->post->isShortlisted($user->seeker))
                        <span class="text-success">Shortlisted</span>
                        @else
                        <span class="text-primary">Pending</span>
                        @endif

                        @if($app->user->seeker->featured != 0)
                            <?php $rsi =  $app->user->seeker->getRsi($app->post); ?>
                            <a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="right"  title="Your Role Suitability Index for {{ $app->post->title }} is {{ $rsi }}%">RSI {{ $rsi }}%</a>
                        @else
                            <a class="fa fa-bar-chart" href="/job-seekers/services#featured_seeker"  data-toggle="tooltip" data-placement="right"  title="Purchase Featured Package to see how your application scores"></a>

                        @endif
                    </div>
                    <div class="col-6 text-md-right text-left">
                        <a href="/profile/applications/{{ $app->id }}" class="btn btn-orange pull-right">View</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @empty
    @endforelse
@else
<div class="card">
  <div class="card-body text-center">
    <p>
      You have not made any job application.
    </p>
  </div>
</div>
@endif
@endsection
