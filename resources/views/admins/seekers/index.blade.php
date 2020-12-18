@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Job Seekers')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Job Seekers')


<form>
    <input type="hidden" name="search" value="true">
    <div class="form-row">
        <div class="form-group col-lg-3" style="display: none">
            <input type="email" name="email" class="form-control" placeholder="Email Address" value="{{ isset($email) ? $email : '' }}">
        </div>
        <div class="form-group col-lg-3">
            <input type="text" name="phone_number" class="form-control" placeholder="Phone Number" value="{{ isset($phone_number) ? $phone_number : '' }}">
        </div>
        <div class="form-group col-lg-3">
            <input type="text" name="keywords" class="form-control" placeholder="Keywords" value="{{ isset($keywords) ? $keywords : '' }}">
        </div>
        <div class="form-group col-lg-3">
            <select name="gender" class="custom-select">
                <option value="">All Genders</option>
                <option value="F" {{ isset($gender) && $gender=='F' ? 'selected="selected"' : '' }}>Female</option>
                <option value="M" {{ isset($gender) && $gender=='M' ? 'selected="selected"' : '' }}>Male</option>
                <option value="I" {{ isset($gender) && $gender=='I' ? 'selected="selected"' : '' }}>Other</option>
            </select>
        </div>
        <div class="form-group col-lg-3">
            <select name="featured" class="custom-select">
                <option value="all" <?php if(isset($featured) && $featured == 'all'){ print  'selected=""'; } ?>>All Job Seekers</option>
                <option value="yes"  <?php if(isset($featured) && $featured == 'yes'){ print  'selected=""'; } ?>>Featured Job Seekers</option>
                <option value="not"  <?php if(isset($featured) && $featured == 'no'){ print  'selected=""'; } ?>>Job Seekers Not Featured </option>
            </select>
        </div>
    </div>
    <div class="form-row mt-3">
        <div class="form-group col-lg-2 text-center">
            <select name="location" class="custom-select">
                <option value="">All Locations</option>
                @forelse($locations as $l)
                <option value="{{ $l->id }}" {{ isset($location) && $location == $l->id ? 'selected="selected"' : '' }}>
                    {{ $l->name.', '.$l->country->name }}
                </option>
                @empty
                @endforelse
            </select>
        </div>
        <div class="form-group col-lg-3 text-center">
            <select name="industry" class="custom-select">
                <option value="">All Industries</option>
                @forelse($industries as $ind)
                <option value="{{ $ind->id }}" {{ isset($industry) && $industry == $ind->id ? 'selected="selected"' : '' }}>{{ $ind->name }}</option>
                @empty
                @endforelse
            </select>
        </div>
        <div class="form-group col-lg-3">
            <select name="experience" class="custom-select">
                <option value="">Any Experience</option>
                @for($i=0; $i<20; $i++)
                <option value="{{ $i }}" {{ isset($experience) && $experience == $i ? 'selected="selected"' : '' }}>{{ $i }} year exp</option>
                @endfor
            </select>
        </div>
        <div class="form-group col-lg-3">
            <select name="dob" class="custom-select">
                <option value="">Any Year Of Birth</option>
                <option value="2000" >Above 2000</option>
                <option value="1990" >1990 to 1999</option>
                <option value="1980" >1980 to 1989</option>
                <option value="1970" >1970 to 1979</option>
                <option value="1960" >1960 to 1969</option>
                <option value="1950" >Below 1959</option>
            
            </select>
        </div>
        <div class="form-group col-lg-1 text-center">
            <button type="submit" name="button" class="btn btn-orange">Search</button>
        </div>
    </div>
</form>

        <form method="GET" action="/v2/admin/seeker-search">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="search" class="form-control" placeholder="Search" value="{{ old('search') }}">
                </div>
                <div class="col-md-6">
                    <button class="btn btn-success">Search</button>
                </div>
            </div>
        </form>

<div class="card">
    <div class="card-body">
        @forelse($seekers as $seeker)
        <div class="row">
            <div class="col-md-3">
                <img src="{{ asset($seeker->user->getPublicAvatarUrl()) }}" style="width: 100%; border-radius: 50%">
            </div>
            <div class="col-md-5 col-12">
                <h4>
                    <a href="/admin/seekers/{{ $seeker->user->username }}" class="orange">
                        {{ $seeker->user->name }}
                        @if($seeker->featured == 1 || $seeker->featured ==2)
                            <span style='color: #500095; font-weight: bold'>*FEATURED*</span>
                        @endif
                    </a>
                </h4>
                <p>{{ $seeker->industry->name }}</p>
                <p>Registered: {{ $seeker->user->created_at }}</p>
                <p>Last CV Update: {{ $seeker->user->updated_at }}</p>
                <div class="row">
                        <div class="col-md-7 col-12">
                              <?php $completed =  $seeker->calculateProfileCompletion(); ?>
                            <div class="progress" style="height: 5px">
                                <div class="progress-bar" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width:{{ $completed }}%">
                                </div>
                            </div>
                            <p>{{ $completed }}% completed</p>
                        </div>
                        <div class="col-md-3 col-12">
                            <p><span class="fa fa-eye">: </span> {{ $seeker->view_count }}</p>
                        </div>                       
                </div>
            </div>
            <div class="col-md-4 col-12 text-md-right text-left">              
                <p><a href="mailto:{{ $seeker->user->email }}" class="orange">{{ $seeker->user->email }}</a></p>
                <p>{{ $seeker->phone_number }}</p>
                <p>{{ $seeker->sex }}</p>

                <p>Age: {{ $seeker->age }}</p>
                
                <form action="/admin/log-in-as" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $seeker->user->id }}">
                    <input type="submit" name="" class="btn btn-sm btn-link pull-right" value="Login As">
                </form>
            </div>
        </div>
        <hr>
        @empty
        <p class="text-center">
            No Job seekers have been found!
        </p>
        @endforelse
        <hr>
        <div class="text-center">
            {{ $seekers->links() }}
        </div>
    </div>
</div>


@endsection
