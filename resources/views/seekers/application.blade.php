@extends('layouts.dashboard-layout')

@section('title','Emploi :: '.$app->post->title.' Application')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', .$app->post->title.' Application')

<div class="card">
    <div class="card-body">
        <h3>
            <i class="fa fa-arrow-left" title="View Applications" onclick="window.location='/profile/applications'"></i>
            {{ $app->post->title }} Application

            <a href="/profile/applications" class="btn btn-sm btn-primary pull-right"><i class="fas fa-user"></i> Profile</a>
            <a href="/vacancies" class="pull-right btn btn-sm btn-success"><i class="fas fa-briefcase"></i> Vacancies</a>
            <p><strong>{{ $app->created_at }}</strong></p>

            <div class="pull-right">
                @if($app->post->isShortlisted($user->seeker))
                <p class="text-success">SHORTLISTED</p>
                @else
                <p>Pending</p>
                @endif
            </div>
        </h3>
        <div style="border-bottom: 0.1em solid gray">
            <h4 style="font-weight: bold">Company</h4>
            <a href="/companies/{{ $app->post->company->id }}">{{ $app->post->company->name }}</a>
            <a href="{{$app->post->company->website}}" class="pull-right">{{$app->post->company->website}}</a>
            <br>
            {{ $app->post->company->tagline }}
        </div>
        <hr>
        <h4>Cover Letter</h4>
        <div>
            <?php echo $app->cover; ?>
        </div>
        <p><i>Resume was attached from your profile</i></p>
    </div>
</div>

@endsection