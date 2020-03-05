@extends('layouts.dashboard-layout')

@section('title','Emploi :: '.$app->post->title.' Application')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', $app->post->title.' Application')

<div class="card">
    <div class="card-body">
        <h3>
            <i class="fas fa-arrow-left" title="View Applications" onclick="window.location='/profile/applications'"></i>
            {{ $app->post->title }} Application

            <a href="/profile/applications" class="btn btn-sm btn-orange pull-right"><i class="fas fa-user"></i> Profile</a>
            <a href="/vacancies" class="pull-right btn btn-sm btn-purple"><i class="fas fa-briefcase"></i> Vacancies</a>
            
        </h3>
        <p>
            <strong>{{ $app->created_at->diffForHumans() }}</strong>
            @if($app->user->seeker->featured != 0)
                <?php $rsi =  $app->user->seeker->getRsi($app->post); ?>
                <a class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="right"  title="Your Role Suitability Index for {{ $app->post->title }} is {{ $rsi }}%">RSI {{ $rsi }}%</a>
            @else

                <a href="/job-seekers/services#featured_seeker"  data-toggle="tooltip" data-placement="right"  title="Purchase Featured Package to see how your application scores">
                    See your RSI Score <i class="fa fa-bar-chart"></i>
                </a>

            @endif
        </p>

        @include('components.ads.responsive')

        <span class="pull-right">
            @if($app->post->isShortlisted($user->seeker))
            <p class="text-success">SHORTLISTED</p>
            @else
            <p>Pending</p>
            @endif
        </span>
        <hr>
            <h4>About the Company</h4>
            <a href="/companies/{{ $app->post->company->id }}">{{ $app->post->company->name }}</a>
            <a href="{{$app->post->company->website}}" class="pull-right">{{$app->post->company->website}}</a>
            <br>
            {{ $app->post->company->tagline }}
        <hr>
        <h4>Cover Letter</h4>
        <div>
            <?php echo $app->cover; ?>
        </div>
        <p><i>Resume was attached from your profile</i></p>
    </div>
</div>

@endsection
