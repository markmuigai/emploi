{{--@extends('layouts.seek')--}}
@extends('layouts.general-layout')

@section('title','Emploi :: @'.$user->username)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@if(Auth::user()->role == 'seeker')
@include('seekers.search-input')
@endif


@section('page_title', $user->name)
<!-- NAV-TABS -->
<ul class="nav nav-tabs" id="jobDetails" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="about-tab" data-toggle="tab" href="#about" role="tab" aria-controls="about" aria-selected="true">About {{ $user->name }}</a>
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

<div class="row">
    <div class="col-lg-8 col-12">
        <!-- NAV-TAB CONTENT -->
        <div class="tab-content pt-2" id="jobDetailsContent">
            <!-- CANDIDATE DETAILS -->
            <div class="tab-pane fade show active" id="about" role="tabpanel" aria-labelledby="about-tab">
                <!-- INFO CARD -->
                <div class="card py-2">
                    <div class="card-body">
                        <h4>About {{ $user->name }}</h4>
                        <div class="row mb-2 text-center about-icons">
                            <div class="col-md-4 col-6 my-3">
                                <i class="orange fas fa-wallet"></i>
                                <p>Offered Salary</p>
                                <p><strong>KSH 12,000 P.M.</strong></p>
                            </div>
                            <div class="col-md-4 col-6 my-3">
                                <i class="orange fas fa-network-wired"></i>
                                <p>Industry</p>
                                <p><strong>{{ $user->seeker->industry->name }}</strong></p>
                            </div>
                            <div class="col-md-4 col-6 my-3">
                                <i class="orange fas fa-user"></i>
                                <p>Gender</p>
                                <p><strong>{{ $user->seeker->gender }}</strong></p>
                            </div>
                            <div class="col-md-4 col-6 my-3">
                                <i class="orange fas fa-briefcase"></i>
                                <p>Experience</p>
                                <p><strong>{{ $user->seeker->years_experience }} Year(s)</strong></p>
                            </div>
                            <div class="col-md-4 col-6 my-3">
                                <i class="orange fas fa-graduation-cap"></i>
                                <p>Qualification</p>
                                <p><strong>{{ $user->seeker->highest_education }}</strong></p>
                            </div>
                            <div class="col-md-4 col-6 my-3">
                                <i class="orange fas fa-sort-amount-up-alt"></i>
                                <p>Career Level</p>
                                <p><strong>Manager</strong></p>
                            </div>
                        </div>
                        <h4>Candidate Description</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo, expedita fugit. Ipsam velit molestias similique quod, delectus, dolore animi nihil.</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                            laborum.</p>
                    </div>
                </div>
                <!-- END OF INFO CARD -->
            </div>
            <!-- END OF CANDIDATE DETAILS -->
            <!-- EDUCATION -->
            <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
                <div class="card py-2">
                    <div class="card-body">
                        <h4>Education and Qualification</h4>
                        <div class="row no-gutters justify-content-between edu pb-5">
                            <div class="circle"></div>
                            <div class="col-lg-3 col-12 ml-3">
                                <p>Walter University</p>
                                <p class="orange">2002 -2004</p>
                            </div>
                            <div class="col-lg-8 col-12 ml-lg-0 ml-md-3">
                                <h6>Masters</h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                    commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                                    anim id est laborum.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END OF EDUCATION -->
            <!-- EXPERIENCE -->
            <div class="tab-pane fade" id="experience" role="tabpanel" aria-labelledby="experience-tab">
                <div class="card py-2">
                    <div class="card-body">
                        <h4>Experience</h4>
                        <div class="row no-gutters justify-content-between edu pb-5">
                            <div class="circle"></div>
                            <div class="col-lg-3 col-12 ml-3">
                                <p>Atract Soluions</p>
                                <p class="orange">2002 -2004</p>
                            </div>
                            <div class="col-lg-8 col-12 ml-lg-0 ml-md-3">
                                <h6>Development Manager</h6>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                    commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                                    anim id est laborum.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END OF EXPERIENCE -->
            <!-- EXPERIENCE -->
            <div class="tab-pane fade" id="skills" role="tabpanel" aria-labelledby="skills-tab">
                <div class="card py-2">
                    <div class="card-body">
                        <h4>Skills</h4>
                        <h5>
                            <span class="badge badge-secondary">HTML</span>
                            <span class="badge badge-secondary">CSS</span>
                            <span class="badge badge-secondary">Javascript</span>
                            <span class="badge badge-secondary">PHP</span>
                            <span class="badge badge-secondary">Laravel</span>
                            <span class="badge badge-secondary">JQuery</span>
                            <span class="badge badge-secondary">Photoshop</span>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-12 pt-2 text-center">
        <h3>Candidate Rating</h3>
        <h1 class="text-success">88%</h1>
        <h5><a href="#" class="btn btn-orange-alt"><i class="fas fa-plus-circle"></i> Invite For Interview</a></h5>
        <button class="btn btn-orange" data-toggle="modal" data-target="#inviteForInterviewModal"><i class="fas fa-plus-circle"></i> Invite For Test</button>
        <div class="card mt-4">
            <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-5">
                        <img src="{{ $user->avatar ? '/storage/avatars/'.$user->avatar : '/images/avatar.png' }}" class="avatar-small" alt="{{ $user->public_name }}" style="border-radius: 50%;" />
                    </div>
                </div>
                <div class="text-center">
                    <p>{{ $user->name }}</p>
                    <p>{{ $user->seeker->current_position }}</p>
                    <p>{{ $user->seeker->location->name }}</p>
                    <p><a href="/storage/resumes/{{ $user->seeker->resume }}" class="btn btn-orange"><i class="fas fa-download"></i> Download CV</a></p>
                    <p></p>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
</div>










<div class="container">
    <div class="single">
        <div class="box_1">
            <div class="col-md-8 service_box1">
                @if($user->role == 'seeker')

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
                <hr>
                <hr>
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



<!-- INVITE FOR AN INTERVIEW -->
<div class="modal fade" id="inviteForInterviewModal" tabindex="-1" role="dialog" aria-labelledby="inviteForInterviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content p-3">
            <div class="modal-body">
                <h5 class="modal-title" id="inviteFriendsLabel">Invite For An Interview</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times" aria-hidden="true"></i>
                </button>
                <form action="">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="">Interview Date</label>
                                <input id="" type="date" class="form-control my-1" placeholder="Interview Date">
                            </div>
                            <div class="col-6">
                                <label for="">Interview Time</label>
                                <input type="time" class="form-control my-1" id="" placeholder="Interview Time">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Interview Location</label>
                            <input type="text" name="" placeholder="Interview Location" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Any Special Instructions</label>
                            <textarea class="form-control" id="" rows="3" placeholder="Any Special Instructions"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-orange pull-center">Send</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection