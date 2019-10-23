@extends('layouts.seek')

@section('title','Emploi :: @'.$user->username)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@if(Auth::user()->role == 'seeker')
    @include('seekers.search-input')
@endif
<style type="text/css">
    .seeker-details .col-md-6 {
        margin-bottom: 0.5em;
    }
</style>

<div class="container">
    <div class="single">  
       <div class="box_1">
        <h2>
            <span  onclick="window.history.back()">
                <i class="fa fa-arrow-left" style="margin-right: 0.5em"></i>
             Browse
            </span>
            
        </h2>
        
        <h3>
            <small style="color: black">
                {{ '@'.$user->username }}
            </small>
            
            <small class="pull-right">
                
                <a href="/storage/resumes/{{ $user->seeker->resume }}" class="btn btn-sm btn-primary"><i class="fa fa-file"></i> view resume</a>
                <a href="/employers/job-seekers/vetting?username={{ $user->username }}" class="btn btn-sm btn-info" style="display: none;"><i class="fa fa-check"></i> Vet</a>
            </small>
            
        </h3>
        <div class="col-md-4 row">
            <img src="{{ $user->avatar ? '/storage/avatars/'.$user->avatar : '/images/avatar.png' }}" class="img-responsive col-md-6 col-md-offset-3" alt="{{ $user->public_name }}" style="border-radius: 50%;" />
            
        </div>
        <div class="col-md-8 service_box1">

            @if($user->role == 'seeker')

            

            <div class="row seeker-details">
                <div>
                    <b>Job Seeker</b>
                    <br><br>
                </div>
                <div class="col-md-6">
                    Name: <b>{{ $user->name }}</b>
                </div>
                <div class="col-md-6">
                    Public name: <b>{{ $user->seeker->public_name }}</b>
                </div>
                <div class="col-md-6">
                    Current Position: <b>{{ $user->seeker->current_position }}</b>
                </div>
                <div class="col-md-6">
                    E-mail: <b>{{ $user->email }}</b>
                </div>
                <div class="col-md-6">
                    Years of Experience: <b>{{ $user->seeker->years_experience }}</b>
                </div>
                <div class="col-md-6">
                    Date of Birth: <b>{{ $user->seeker->date_of_birth }}</b>
                </div>
                <div class="col-md-6">
                    Phone Number: <b>{{ $user->seeker->phone_number }}</b>
                </div>
                <div class="col-md-6">
                    Address: <b>{{ $user->seeker->post_address }}</b>
                </div>
                <div class="col-md-6">
                    Highest Education: <b>{{ $user->seeker->highest_education }}</b>
                </div>
                <div class="col-md-6">
                    Gender: <b>{{ $user->seeker->gender }}</b>
                </div>
                @if(isset($user->seeker->location_id))
                <div class="col-md-6">
                    Location: <b>{{ $user->seeker->location->name }}</b>
                </div>
                @endif
                <div class="col-md-6">
                    Country: <b>{{ $user->seeker->country->name }}</b>
                </div>
                <div class="col-md-6">
                    Industry/Profession: <b>{{ $user->seeker->industry->name }}</b>
                </div>
                @if(isset($user->seeker->objective))
                <div class="col-md-8 col-md-offset-2" style="padding: 1em">
                    <u style="font-weight: bold;">Career Objective:</u> <br>{{ $user->seeker->objective }}
                </div>
                @endif
            </div>

            <div class="row" style="margin: 1em 0">
                @if(count($user->seeker->experience()) > 0)
                <div class="col-md-10 col-md-offset-1">
                    <h4 style="text-decoration: underline;">Work Experience:</h4> <br>
                    <?php $exp = $user->seeker->experience();  ?>
                    @for($i=count($exp)-1; $i>=0; $i--)
                        <div style="margin-bottom: 1em; border-bottom: 0.1em solid black">
                            <b>
                                <?php echo $exp[$i][1].'</b> at <b>'.$exp[$i][0]; ?>
                            </b>
                                <i class="pull-right">
                                    <?php echo $exp[$i][2].' - '.$exp[$i][3]; ?>
                                </i>
                             <br><br>
                             {{ $exp[$i][4] }}

                        </div>
                    @endfor
                </div>
                @endif

                @if(count($user->seeker->education()) > 0)
                <div class="col-md-10 col-md-offset-1">
                    <h4 style="text-decoration: underline;">Education Background:</h4> <br>
                    <?php $exp = $user->seeker->education();  ?>
                    @for($i=count($exp)-1; $i>=0; $i--)
                        <div style="margin-bottom: 1em; border-bottom: 0.1em solid black">
                            <b>
                                <?php echo $exp[$i][1]; ?>
                            </b>
                                <i class="pull-right">
                                    <?php echo $exp[$i][2] ?>
                                </i>
                             <br><br>
                             {{ $exp[$i][0] }}

                        </div>
                    @endfor
                </div>
                    
                @endif
            </div>
            @if(count($user->seeker->matchSeeker(Auth::user())) > 0)
            <hr><hr>
            <div>
                <form method="post" action="/employers/shortlist">
                    @csrf
                    <input type="hidden" name="seeker_id" value="{{ $user->id }}">
                    <select class="btn " name="post_id" required="required">
                        <option>Shortlist for:</option>
                        @forelse($user->seeker->matchSeeker(Auth::user()) as $post)
                        <option value="{{ $post->id }}">{{ $post->title }}</option>
                        @empty
                        @endforelse
                        
                    </select>
                    <button class="btn btn-sm btn-success">Go</button>
                </form>
            </div>
            @endif


            @elseif($user->role == 'employer')

            <h5>Role: Employer</h5>
            <p>
                Name: <b>{{ $user->name }}</b> <br>
            </p>

            @elseif($user->role == 'admin')

            <h5>Role: Administrator</h5>
            <p>
                Name: <b>{{ $user->name }}</b> <br>
            </p>

            @elseif($user->role == 'super')

            <h5>Role: Super Administrator</h5>
            <p>
                Name: <b>{{ $user->name }}</b> <br>
            </p>

            @endif

            
            
        </div>
        <div class="clearfix"> </div>
       </div>
       
    </div>
</div>

@endsection