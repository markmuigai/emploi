@extends('layouts.dashboard-layout')

@section('title','Emploi :: @'.$user->username)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Profile')

@if($user->role == 'seeker')
<div class="row align-items-center">
    <div class="col-md-10">
        <!-- NAV-TABS -->
        <ul class="nav nav-tabs mb-3" id="jobDetails" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="true">Personal Details</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="education-tab" data-toggle="tab" href="#education" role="tab" aria-controls="education" aria-selected="false">Education</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="experience-tab" data-toggle="tab" href="#experience" role="tab" aria-controls="experience" aria-selected="false">Experience</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="skills-tab" data-toggle="tab" href="#skills" role="tab" aria-controls="skills" aria-selected="false">Skills</a>
            </li>
        </ul>
    </div>
    @if(isset(Auth::user()->id))
    <div class="col-md-2">
        <a href="/profile/edit" class="btn btn-orange"><i class="fas fa-edit"></i> Edit</a>
    </div>
    @endif
</div>

<div class="row">
    <div class="col-lg-8 col-12">
        <!-- NAV-TAB CONTENT -->
        <div class="tab-content pt-2" id="jobDetailsContent">
            <!-- CANDIDATE DETAILS -->
            <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                <!-- INFO CARD -->
                <div class="card py-2 mb-4">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-lg-2 col-md-3 col-4">
                                <img src="{{ $user->avatar ? '/storage/avatars/'.$user->avatar : '/images/avatar.png' }}" class="img-responsive w-100" alt="My Avatar" />
                            </div>
                            <div class="col-lg-8 col-md-7 col-8">
                                <h3 class="text-uppercase">{{ $user->name }}</h3>
                                <h5>
                                    Job Seeker
                                    <br>
                                    <small title="Referral Credits">[ {{ $user->totalCredits }} credits ]</small>
                                </h5>
                                @if(!$user->seeker->hasCompletedProfile())
                                <p style="text-align: center; font-size: 90%; ">
                                    <a href="/profile/edit" class="text-danger" style="color: red"> <i class="fas fa-info"></i> Update your profile and start applying for jobs</a>
                                </p>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-2 text-center about-icons">
                            <div class="col-md-4 col-6 my-3">
                                <i class="orange fas fa-map-marker-alt"></i>
                                <p>Location</p>
                                <p><strong>{{ $user->seeker->location_id ? $user->seeker->location->name.', '.$user->seeker->location->country->code : 'Not set' }}</strong></p>
                            </div>
                            <div class="col-md-4 col-6 my-3">
                                <i class="orange fas fa-network-wired"></i>
                                <p>Industry</p>
                                <p><strong>{{ $user->seeker->industry->name }}</strong></p>
                            </div>
                            <div class="col-md-4 col-6 my-3">
                                <i class="orange fas fa-user"></i>
                                <p>Gender</p>
                                <p><strong>{{ $user->seeker->sex }}</strong></p>
                            </div>
                            <div class="col-md-4 col-6 my-3">
                                <i class="orange fas fa-briefcase"></i>
                                <p>Experience</p>
                                <p><strong>{{ $user->seeker->years_experience }} Year(s)</strong></p>
                            </div>
                            <div class="col-md-4 col-6 my-3">
                                <i class="orange fas fa-graduation-cap"></i>
                                <p>Qualification</p>
                                <p><strong>{{ $user->seeker->education_level_id ? $user->seeker->educationLevel->name : 'Not set' }}</strong></p>
                            </div>
                            <div class="col-md-4 col-6 my-3">
                                <i class="orange fas fa-sort-amount-up-alt"></i>
                                <p>Career Level</p>
                                <p><strong>Manager</strong></p>
                            </div>
                        </div>

                        <h4>About Me</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium tenetur tempore officiis magnam animi dolor, ex soluta repellat pariatur saepe quia, quas ipsa quod, ullam illum laborum ad modi sed fuga, molestiae.
                            Eaque
                            consectetur debitis quam, adipisci magni, quibusdam aperiam!</p>

                        <h4>Career Objective</h4>
                        <p>
                            {{ $user->seeker->objective ? $user->seeker->objective : 'Career Objective not included' }}
                        </p>
                    </div>
                </div>
                <!-- END OF INFO CARD -->
            </div>
            <!-- END OF CANDIDATE DETAILS -->
            <!-- EDUCATION -->
            <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
                <div class="card py-2 mb-4">
                    <div class="card-body">
                        <h4>Education and Qualification</h4>
                        @if(!is_array($user->seeker->education()))
                        <?php echo $user->seeker->education; ?>
                        @else
                        @forelse($user->seeker->education() as $edu)
                        <div class="row no-gutters justify-content-between edu pb-5">
                            <div class="circle"></div>
                            <div class="col-lg-3 col-12 ml-3">
                                <p>{{ $edu[0] }}</p>

                            </div>
                            <div class="col-lg-8 col-12 ml-lg-0 ml-md-3">
                                <h6>{{ $edu[1] }}</h6>
                                <p class="orange">{{ $edu[2] }}</p>
                            </div>
                        </div>
                        @empty
                        <p>
                            No education records highlighted.
                        </p>
                        @endforelse
                        @endif
                    </div>
                </div>
            </div>
            <!-- END OF EDUCATION -->
            <!-- EXPERIENCE -->
            <div class="tab-pane fade" id="experience" role="tabpanel" aria-labelledby="experience-tab">
                <div class="card py-2 mb-4">
                    <div class="card-body">
                        <h4>Experience</h4>
                        @if(!is_array($user->seeker->experience()))
                        <?php echo $user->seeker->experience; ?>
                        @else
                        @forelse($user->seeker->experience() as $emp)
                        <div class="row no-gutters justify-content-between edu pb-5">
                            <div class="circle"></div>
                            <div class="col-lg-3 col-12 ml-3">
                                <p>{{ $emp[0] }}</p>

                            </div>
                            <div class="col-lg-8 col-12 ml-lg-0 ml-md-3">
                                <h6>{{ $emp[1] }}</h6>
                                <p class="orange">{{ $emp[2] }} to {{ $emp[3] }}</p>
                                <p>{{ $emp[4] }}</p>
                            </div>
                        </div>
                        @empty
                        <p>
                            No experience records have been highlighted
                        </p>
                        @endforelse
                        @endif
                    </div>
                </div>
            </div>
            <!-- END OF EXPERIENCE -->
            <!-- EXPERIENCE -->
            <div class="tab-pane fade" id="skills" role="tabpanel" aria-labelledby="skills-tab">
                <div class="card py-2 mb-4">
                    <div class="card-body">
                        <h4>Skills</h4>
                        <h5>
                            @forelse($user->seeker->skills as $s)
                            <span class="badge badge-secondary">{{ $s->skill->name }}</span>
                            @empty
                            <p>No skills highlighted</p>
                            @endforelse
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-12 pt-2">
        <div class="card">
            <div class="card-body">
                <h4>Contact Info</h4>
                <p>
                    <strong>Email: </strong>
                    {{ $user->email }}
                </p>
                <p><strong>Phone Number: </strong>
                    {{ $user->seeker->phone_number ? $user->seeker->phone_number : '-no phone number-' }}
                </p>
                <p>
                    <strong>Location: </strong>
                    {{ $user->seeker->location_id ? $user->seeker->location->name.', '.$user->seeker->location->country->code : 'Not set' }}</strong>
                </p>
                <a href="/profile/referees" class="btn btn-purple">Referees</a>
            </div>
        </div>
    </div>
</div>

<!-- END OF JOB SEEKER PROFILE -->
@elseif($user->role == 'employer')

<div class="card">
    <div class="card-body p-4">
        <div class="row align-items-center">
            <div class="col-lg-2 col-md-3 col-4">
                <img src="{{ $user->avatar ? '/storage/avatars/'.$user->avatar : '/images/avatar.png' }}" class="img-responsive w-100" alt="My Avatar" />
            </div>
            <div class="col-lg-8 col-md-7 col-8">
                <h3 class="text-uppercase">{{ $user->name }}</h3>

                <h5>
                    Employer
                    <br>
                    <small title="Referral Credits">[ {{ $user->totalCredits }} credits ]</small>
                </h5>
                
            </div>
            <div class="col-md-2 col-12">
                <a href="/profile/edit" class="orange"><i class="fas fa-edit"></i> Edit</a>
            </div>
        </div>

        @forelse($user->companies as $company)
        <hr>
        <h3 style="float: none; text-align: right; color: #500095; font-weight: bold;">
            <a href="/companies/{{ $company->name }}">{{ $company->name }}</a>
            
        </h3>
        <div class="row mt-4">
            <div class="col-md-6">
                <p><strong>Website: </strong><a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a></p>
            </div>
            <div class="col-md-6">
                <p><strong>Company Size: </strong>{{ $company->companySize->title }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Industry: </strong>{{ $company->industry->name }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Type: </strong>Privately Held</p>
            </div>
            <div class="col-md-6">
                <p><strong>Headquarters: </strong>{{ $company->location->name . ', '.$company->location->country->name }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Tagline: </strong>{{ $company->tagline }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Status: </strong>{{ $company->status }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Jobs Posted: </strong>{{ count($company->posts) }}</p>
            </div>
        </div>
        
        <h5>About</h5>
        <p><?php echo $company->about ?></p>
        @empty

        <p style="text-align: center;">
            No companies found. <a href="/companies/create">Create a company</a>
        </p>

        @endforelse

        
        <hr style="display: none">
        <h5 class="mt-4" style="display: none">Office Location</h5>
        <p style="display: none">Repen Complex, Syokimau Junction</p>
        <iframe style="display: none"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.6634497341915!2d36.92601481464639!3d-1.378599798994531!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f0ce7aa2120e1%3A0x2905bde1b42e68a!2sREPEN%20Complex!5e0!3m2!1sen!2ske!4v1573633191589!5m2!1sen!2ske"
          frameborder="0" style="border:0;" allowfullscreen=""></iframe>
        
    </div>
</div>
@else
No actions available
@endif

@endsection