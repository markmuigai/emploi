@extends('layouts.dashboard-layout')

@section('title','Emploi :: Job Seeker Dashboard')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Dashboard')

    <style>
      #blur {
        font-size: 40px;
        color: transparent;
        text-shadow: 0 0 12px #fff;
      }
  </style>

<?php
$user = Auth::user();
?>
@if(isset(Auth::user()->id) && Auth::user()->role == 'seeker' && $user->seeker->isOnPaas())
<a href="#paas_task" class="btn btn-orange">Apply for part time jobs</a>
@else
<a href="/job-seekers/register-paas" class="btn btn-orange">Apply for part time jobs</a>
@endif
@if(isset(Auth::user()->id) && Auth::user()->role == 'seeker' && $user->seeker->isOnPaas())
<a href="/job-seekers/tasks" class="btn btn-orange">View Your PaaS Jobs</a>
@endif<br>
@if($user->seeker->featured > 0)
<br><h4 align="center">Profile Performance Summary</h4><br>
<style>
	.seeker-analytics{
	/*  position: relative;
	  display: flex;
	  flex-direction: row;
	  min-width: 0;
	  word-wrap: break-word;*/
	  background-color: #500095;
	  color: white;
/*	  color: white;
	  background-clip: border-box;
	  border: 0px solid rgba(0, 0, 0, 0.125);
	  border-radius: 0;*/
	}
</style>
<div class="card-deck">
    <div class="card seeker-analytics">
    	<a href="/profile/applications">
	        <div class="card-body text-center">
	            <h1 class="white">{{ count(\App\JobApplication::Where('user_id',$user->id)->get()) }}</h1>
	            <p>Applications</p>
	        </div>
        </a>
    </div>
     <div class="card seeker-analytics">
     	<a href="/profile/applications">
	        <div class="card-body text-center">
	            <h1 class="white">{{ count(\App\JobApplication::Where('user_id',$user->id)->Where('status', 'shortlisted')->get()) }}</h1>
	            <p>Shortlisted</p>
	        </div>
        </a>
	</div>
	 <div class="card seeker-analytics">
	 	<a href="/profile/applications">
	        <div class="card-body text-center">
	            <h1 class="white">{{ count(\App\JobApplication::Where('user_id',$user->id)->Where('status', 'rejected')->get()) }}</h1>
	            <p>Rejected</p>
	        </div>
        </a>
	</div>
	<div class="card seeker-analytics">
		<a href="/vacancies/{{ $user->seeker->industry->slug }}">
				<div class="card-body text-center">
				<h1 class="white">{{ count(\App\Post::Where('industry_id',$user->seeker->industry_id)->Where('status','active')->get()) }}</h1>
				<p>{{ $user->seeker->industry->name }} <br>Vacancies</p>
			</div>
		</a>
	</div>
	<div class="card seeker-analytics">
        <div class="card-body text-center">
            <h1 class="white">{{ $user->seeker->view_count }}</h1>
            <p><br>Profile Views</p>
        </div>
    </div>
</div>
 @endif

  @if($user->seeker->featured == 1)
  <br><h5 class="orange" style="text-align: center;"><a href="/checkout?product=spotlight">Upgrade your spotlight plan with yearly payment to win one month free</a></h5>
  @endif
  
  @if($user->seeker->featured == 2)
  <br><h5 class="orange" style="text-align: center;">You are currently on yearly spotlight plan</h5>
  @endif

 @if($user->seeker->featured == 0)
<br><h4 align="center">Profile Performance Summary</h4><br>
<style>
	.seeker-analytics{
	/*  position: relative;
	  display: flex;
	  flex-direction: row;
	  min-width: 0;
	  word-wrap: break-word;*/
	  background-color: #500095;
	  color: white;
/*	  color: white;
	  background-clip: border-box;
	  border: 0px solid rgba(0, 0, 0, 0.125);
	  border-radius: 0;*/
	}
</style>
<div class="card-deck">
    <div class="card seeker-analytics" data-toggle="tooltip"  title="Purchase spotlight plan to unlock your job applications summary">
        <div class="card-body text-center">
            <h1 class="white" id="blur">88</h1>
            <p>Applications</p>
        </div>
    </div>
     <div class="card seeker-analytics" data-toggle="tooltip"  title="Purchase spotlight plan to view your shortlist summary">
        <div class="card-body text-center">
            <h1 class="white" id="blur">8</h1>
            <p>Shortlisted</p>
        </div>
	</div>
	 <div class="card seeker-analytics" data-toggle="tooltip"  title="Purchase spotlight plan to unlock your job application rejection summary">
        <div class="card-body text-center">
           <h1 class="white" id="blur">88</h1>
            <p>Rejected</p>
        </div>
	</div>
	<div class="card seeker-analytics" data-toggle="tooltip"  title="Purchase spotlight plan to unlock your vacancies summary">
        <div class="card-body text-center">
            <h1 class="white" id="blur">88</h1><br>
            <p>{{ $user->seeker->industry->name }} Vacancies</p>
        </div>
    </div>
	<div class="card seeker-analytics" data-toggle="tooltip"  title="Purchase spotlight plan to unlock your profile views summary">
        <div class="card-body text-center">
           <h1 class="white" id="blur">88</h1>
            <p>Profile Views</p>
        </div>
    </div>
</div>
<br><h5 class="orange" style="text-align: center;"><a href="/checkout?product=spotlight">Purchase spotlight plan to unlock your profile performance summary</a></h5>
 @endif

@if(isset(Auth::user()->id) && Auth::user()->role == 'seeker' && $user->seeker->isOnPaas())
<br>
@if(session()->has('applied'))
	  <div class="alert alert-success">
	  {{ session()->get('applied') }}
	  </div>
@endif

@if(isset($user->seeker->industry_id))
<br id="paas_task"><br>
<hr>
<h4>{{ $user->seeker->industry->name }} Part Time Jobs</h4>
<?php
$tasks = \App\Task::where('status','active')->where('industry',$user->seeker->industry_id)->orderBy('id','DESC')->paginate(8);
?>
<div class="row">
	@forelse ($tasks as $t)
	<div class="col-lg-6">
		<div class="card my-2">
			<div class="card-body">
				<div class="row">
					<div class="col-6">
						<h5><a href="">{{ $t->title }}</a></h5>
						<p>
							{{ $t->company }}
							<small class="badge badge-purple">{{ $t->salary }}</small>
						</p>					
						<span href="">{{ $t->created_at->diffForHumans() }}</span>

						<?php 
		                    $show = true; 
		                    if(Auth::user()->seeker->hasAppliedTask($t))
		                    {
		                        $show = false;
		                    }
		                ?>
		                @if($show)
		                <a href="/job-seekers/apply-task/{{ $t->slug }}" class="btn btn-orange">Apply</a>
		                @else
		                <span class="btn btn-orange-alt">Applied</span>
		                @endif
					</div>
					<div class="col-md-6">
						<h6>Details</h6>
                        <p class="truncate">{!!html_entity_decode($t->preview)!!}</p>
                         <a href="{{ url('/paas-task/main_content/'.$t->id) }}" class="orange">Read More</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	@empty
	<div class="col-12 my-3 text-center">
		<div class="card">
			<div class="card-body">
				<p>Check Back Later.</p>
			</div>
		</div>
	</div>
	@endforelse
</div>
	{{ $tasks->links() }}
	<hr>
@endif
@endif

<br><h4>Recent Blogs</h4>
<div class="row">
	<div class="col-md-12">
		<?php $blogsTransparent = true; ?>
		@include('components.blogs')
	</div>
	
</div>
<hr>
<div style="text-align: center;" class="row">
	<div class="col-md-8 offset-md-2">
		<a href="/refer">
			<img src="/images/friends_refer_thin-flat.png" style="width: 80%" alt="Refer your Friends and Win">
		</a>
	</div>
	
</div>
<?php
$user = Auth::user();
?>

@if(isset($user->seeker->industry_id))
<hr>
<h4>{{ $user->seeker->industry->name }} Jobs</h4>
<?php
$posts = \App\Post::where('industry_id',$user->seeker->industry_id)->where('status','active')->orderBy('id','DESC')->orderBy('featured','DESC')->paginate(8);
?>
<div class="row">

	@forelse ($posts as $b)
	<div class="col-lg-6">
		<div class="card my-2">
			<div class="card-body">
				<div class="row align-items-center">
					<div class="col-4">
						<img src="{{ asset($b->imageUrl) }}" class="w-100" alt="{{ $b->title }}">
						<br>
						<span href="/vacancies/{{ $b->slug }}">{{ $b->created_at->diffForHumans() }}</span>
					</div>
					<div class="col-8">
						<h5><a href="/vacancies/{{ $b->slug }}">{{ $b->title }}</a></h5>
						<p>
							<a href="/companies/{{ $b->company->name }}">{{ $b->company->name }}</a>
							<small class="badge badge-purple">{{ $b->monthlySalary() }}</small>
						</p>
						

						
						<?php 
		                    $show = true; 
		                    if(Auth::user()->seeker->hasApplied($b))
		                    {
		                        $show = false;
		                    }
		                ?>
		                @if($show)
		                <a href="/vacancies/{{ $b->slug }}" class="btn btn-orange">View and Apply</a>

		                @else
		                <span class="btn btn-orange-alt">Application Sent</span>

		                @endif
					</div>
				</div>
			</div>
		</div>
	</div>
	@empty
	<div class="col-12 my-3 text-center">
		<div class="card">
			<div class="card-body">
				<p>No Industry jobs have been posted.</p>
			</div>
		</div>
	</div>
	@endforelse
</div>
<div>
	{{ $posts->links() }}
</div>

@else

@include('components.ads.responsive')

@endif

<script type="text/javascript">
  //toggle buy spotlight message on hover
    $('[data-toggle="tooltip"]').tooltip();
</script>

@endsection