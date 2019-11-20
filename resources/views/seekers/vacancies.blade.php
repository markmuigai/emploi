@extends('layouts.dashboard-layout')

@section('title','Emploi :: Vacancies')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Job Vacancies')

<!-- JOB CARD -->
@forelse($posts as $post)
<div class="card py-2 mb-4">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-12 col-lg-8">
                <div class="row align-items-center">
                    <div class="col-4">
                        
                        <a href="/vacancies/{{$post->slug}}/">
                            <img src="{{ asset($post->imageUrl) }}" class="w-100" alt="" />
                        </a>
                    </div>
                    <div class="col-8">
                        <h4><a href="/vacancies/{{$post->slug}}/">{{ $post->title }}</a></h4>
                        <a href="#" class="text-success">{{ $post->company->name }}</a>
                        <p><i class="fas fa-map-marker-alt orange"></i> {{ $post->location->country->name }}, {{ $post->location->name }}</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 job-actions">
                <p><i class="far fa-calendar-check"></i> {{ $post->readableDeadline }}</p>
                <p>
                    <strong>
                        @if(isset(Auth::user()->id))
                        {{ $post->monthlySalary() }} {{ $post->monthly_salary == 0 ? '' : 'p.m.' }}
                        @else
                        Login to view salary
                        @endif
                    </strong>
                </p>
                @if($post->how_to_apply)
                <p>Alternative Application</p>
                @else
                <p>Current Openings: <strong>{{ $post->positions }} Position{{ $post->positions == 1 ? '' : 's' }}</strong></p>
                @endif
                <p>Deadline: <strong><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($post->deadline))->diffForHumans() ?></strong></p>
            </div>

        </div>
        <hr>
        <div class="row justify-content-between align-items-center">
            <div class="col-12 col-md-6 col-lg-4">
                <p>
                    @if($post->isActive)
                    <i class="fas fa-share-alt"></i>
                    Share:
                    <a href="{{ $post->shareFacebookLink }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{ $post->shareTwitterLink }}" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="{{ $post->shareLinkedinLink }}" target="_blank"><i class="fab fa-linkedin"></i></a>
                    @else
                    <span>Sharing Disabled</span>
                    @endif
                </p>
            </div>
            <div class="col-12 col-md-6 col-lg-4 job-actions">
                <p>
                    <span class="badge {{ $post->vacancyType->badge }}">{{ $post->vacancyType->name }}</span>
                </p>
            </div>
        </div>
    </div>
</div>
@empty
<p style="text-align: center;">No Job posts found</p>
@endforelse
<!-- END OF ALL JOBS -->

<div>
    {{ $posts->links() }}
</div>


@endsection