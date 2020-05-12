@extends('layouts.dashboard-layout')

@section('title','Emploi :: @'.$user->username)

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa.
@endsection

@section('content')
@section('page_title', 'Profile')

@include('components.ads.responsive')

@if($user->role == 'seeker')
<div class="row align-items-center">
    <div class="col-md-12 col-lg-10">
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
    <div class="col-md-12 col-lg-2 text-right">
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
                            <div class="col-md-3 col-4">
                                <img src="{{ $user->avatar ? '/storage/avatars/'.$user->avatar : '/images/avatar.png' }}" class="img-responsive w-100" alt="My Avatar" />
                            </div>
                            <div class="col-md-7 col-8">
                                <h3 class="">{{ $user->getName() }}</h3>
                                <h5>
                                    
                                    @if($user->seeker->featured == 1)
                                    <a class="" style="font-weight: bold" href="/job-seekers/services#featured_seeker"  data-toggle="tooltip" data-placement="left"  title="You are a featured Job Seeker on Emploi">
                                    Featured
                                    </a>
                                    @endif
                                    
                                    Job Seeker
                                    
                                    @if($user->seeker->canGetNotifications())
                                    <a class="fa fa-bell" href="/job-seekers/services#seeker_basic"  data-toggle="tooltip" data-placement="right" title="Shortlist Notifications Enabled" ></a>
                                    @else
                                    <a class="fa fa-bell-slash" href="/job-seekers/services#seeker_basic"  data-toggle="tooltip" data-placement="right"  title="Shortlist Notifications Disabled"></a>
                                    @endif

                                    
                                </h5>
                                <h6 title="Referral Credits">
                                    <a href="/profile/invites">
                                    [ {{ $user->totalCredits }} credits ]
                                    </a>
                                    @if($user->seeker->searching)
                                    <span class="badge badge-success">Searching</span>
                                    @endif
                                </h6>
                                @if(!$user->seeker->hasCompletedProfile())
                                <p class="text-center">
                                    <a href="/profile/edit" class="text-danger"> <i class="fas fa-info"></i> Update your profile and start applying for jobs</a>
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
                                <p>{{ $emp[0] }} <?php print isset($emp[5]) && $emp[5] == 'true' ? "<br><b style='color: #500095'>*Current*</b>" : ""; ?></p>

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
                    {{ $user->getEmail() }}
                </p>
                <p><strong>Phone Number: </strong>
                    {{ $user->seeker->phone_number ? $user->seeker->phone_number : '-no phone number-' }}
                </p>
                <p>
                    <strong>Location: </strong>
                    {{ $user->seeker->location_id ? $user->seeker->location->name.', '.$user->seeker->location->country->code : 'Not set' }}</strong>
                </p>
                <p>
                    @if($user->seeker->featured != 1)
                    <a class="btn btn-orange" href="/job-seekers/services#featured_seeker" title="Let employers find you easily">
                        <i class="fa fa-star"></i>
                    Get Featured
                    </a>
                    @endif
                </p>
                <p>
                    <a href="/profile/referees" class="btn btn-purple">My Referees</a>
                </p>
                
                <p>
                    @if(isset($user->seeker->resume))
                    <a href="/storage/resumes/{{ $user->seeker->resume }}" class="btn btn-success-">View Current CV</a>
                    @else
                    <span>CV Not Found! <a href="/profile/edit">edit profile</a></span>
                    @endif
                </p>

                @if(!$user->seeker->canGetNotifications())
                <p>
                    <a href="/job-seekers/services#seeker_basic" class="btn btn-orange-alt">Enable Shortlist Notifications</a>
                </p>
                @endif
                

                
            </div>
        </div>
    </div>
</div>

<!-- END OF JOB SEEKER PROFILE -->
@elseif($user->role == 'employer')

<div class="card">
    <div class="card-body px-4 pt-4 pb-0">
      <div class="row">
        <div class="col-lg-3 col-md-4 col-6">
          <img src="{{ $user->avatar ? '/storage/avatars/'.$user->avatar : '/images/avatar.png' }}" class="circle-img w-100 h-100" alt="{{ $user->name }}">
        </div>
      </div>
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-10 col-12">
                <h3 class="text-uppercase">{{ $user->name }}</h3>

                <h5>
                    Employer
                    <br>
                    <small title="Referral Credits">
                        <a href="/profile/invites">
                            [ {{ $user->totalCredits }} credits ]
                        </a>
                    </small>
                </h5>

            </div>
            <div class="col-md-2 col-12">
                <a href="/profile/edit" class="orange"><i class="fas fa-edit"></i> Edit Profile</a>
            </div>
        </div>

        <?php
        $companies = \App\Company::where('user_id',$user->id)->orderBy('name')->paginate(20);
        $boosts = Auth::user()->employer->remainingCompanyBoosts();
        $products = \App\Product::whereIn('slug',['featured_company','solo','solo_plus','infinity','stawi'])->get()
        ?>

        <div style="border: 0.1em solid #500095;  padding: 1em; text-align: center;">
            
            Let users find your company on the front page, and have jobs highlighted.  <br>
            <form method="post" action="/checkout" id="featured_company_form">
                @csrf
                <select name="product" class="form-control" required="">
                    @forelse($products as $product)
                    <option value="{{ $product->slug }}">{{ $product->title }} - {{ $product->getPrice() }}</option>
                    @empty
                    @endforelse
                </select>
                <p>
                    <input type="submit" title="Purchase" class="btn btn-orange btn-sm">
                    <a href="/employers/publish" class="btn btn-sm btn-orange-alt">Learn more</a>
                </p>
            </form>
        </div>

        @forelse($companies as $company)
            <hr id="">
            <h3  class="orange">
                <a href="/companies/{{ $company->name }}">{{ $company->name }}</a>
                <a href="/companies/{{ $company->name }}/edit" class="pull-right btn btn-sm btn-orange-alt" style="float: right;">Edit Company Details</a>
                
            </h3>

            @if(!$company->isFeatured())
                @if(count($boosts) > 0)
                <hr>
                <p>
                    <a href="/companies/{{ $company->name }}/make-featured" class="btn btn-orange">Boost {{ $company->name }}</a> This will make the company appear top, and vacancies highlighted
                </p>
                <hr>
                @else
                
                @endif
            @else
            <p>
                <a href="/companies/{{ $company->name }}" class="btn btn-orange"> <i class="fa fa-check"></i> Boosted</a>
            </p>
            @endif

            
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Website: </strong><a href="{{ $company->website }}" target="_blank" rel="noreferrer">{{ $company->website }}</a></p>
                </div>
                <div class="col-md-6">
                    <p><strong>Company Size: </strong>{{ $company->companySize->title }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Industry: </strong>{{ $company->industry->name }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Location: </strong>{{ $company->location->name . ', '.$company->location->country->name }}</p>
                </div>
                <div class="col-md-6">
                    <p class="text-capitalize"><strong>Tagline: </strong>{{ $company->tagline }}</p>
                </div>
                <div class="col-md-6">
                    <p class="text-capitalize"><strong>Status: </strong>{{ $company->status }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Jobs Posted: </strong>{{ count($company->posts) }}</p>
                </div>
            </div>

            <h5 class="pt-3">About</h5>
            <p><?php echo $company->about ?></p>
        @empty

            <p class="text-center">
                No companies found. <a href="/companies/create">Create a company</a>
            </p>

        @endforelse

        <div>
            {{ $companies->links() }}
        </div>
         
    </div>
        <br><h4><center><b>Video Demo</b></center></h4>
            <iframe width="70" height="70" src="https://www.youtube.com/embed/DKojcDYgJ5w" frameborder="0" allowfullscreen></iframe>
            </iframe>
</div>
@elseif($user->role == 'admin')
Admin Account Management. <br>

<a href="/profile/invites">Manage Invites</a>  <br>
{{ $user->totalCredits }} Credits
@else
No actions available 
@endif

@endsection
