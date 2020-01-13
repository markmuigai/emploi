@extends('layouts.dashboard-layout')

@section('title','Emploi :: '.$post->getTitle() )

@section('description')
{{ $post->brief }}
@endsection

@section('meta-include')
<meta property="og:image" content="{{ asset($post->imageUrl) }}">
<meta property="og:image:width"   content="900" />
<meta property="og:image:height"  content="600" />

<meta property="og:url"           content="{{ url('/vacancies/'.$post->slug) }}/" />
<meta property="og:title"         content="{{ $post->title }}" />
<meta property="og:description"   content="{{ $post->brief }}" />
@endsection

@section('content')
@section('page_title', $post->getTitle() )
<!-- NAV-TABS -->
<ul class="nav nav-tabs" id="jobDetails" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="job-description-tab" data-toggle="tab" href="#job-description" role="tab" aria-controls="job-description" aria-selected="true">Job Description</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="apply-tab" data-toggle="tab" href="#apply" role="tab" aria-controls="apply" aria-selected="false">How to Apply</a>
    </li>
</ul>
<div class="row">
    <div class="col-lg-9 col-md-12">
        <!-- NAV-TAB CONTENT -->
        <div class="tab-content pt-2" id="jobDetailsContent">
            <!-- ALL JOBS -->
            <div class="tab-pane fade show active" id="job-description" role="tabpanel" aria-labelledby="job-description-tab">
                <!-- JOB CARD -->
                <div class="card py-2 mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-5 col-md-12 d-flex justify-content-between align-items-center">
                                <p>
                                    <i class="fas fa-share-alt"></i> Share:
                                </p>
                                <a href="{{ $post->shareFacebookLink }}" target="_blank"  rel="noreferrer">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="{{ $post->shareTwitterLink }}" target="_blank"  rel="noreferrer">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="{{ $post->shareLinkedinLink }}" target="_blank"  rel="noreferrer">
                                    <i class="fab fa-linkedin"></i>
                                </a>

                                <a href="{{ $post->shareWhatsappLink }}" target="_blank"  rel="noreferrer" data-action="share/whatsapp/share"><i class="fab fa-whatsapp"></i></a>
                            </div>
                            <div class="col-lg-7 col-md-12 text-right">

                            </div>
                        </div>
                        <hr>
                        <div class="row pb-3">
                            <div class="col-12 col-md-6 col-lg-7">
                                <h5>{{ $post->getTitle() }} <span class="badge badge-secondary">{{ $post->positions }} Position{{ $post->positions == 1 ? '' : 's' }}</span></h5>
                                <a href="/companies/{{ $post->company->name }}">{{ $post->company->name }}</a>
                                <p>
                                    <i class="fas fa-map-marker-alt orange"></i>
                                    {{ $post->location->name }}, {{ $post->location->country->name }}
                                </p>
                            </div>
                            <div class="col-12 col-md-6 col-lg-5 d-flex flex-column justify-content-between text-sm-left text-md-right">
                                <p>
                                    <strong>
                                        @if(isset(Auth::user()->id))
                                        {{ $post->monthlySalary() }} {{ $post->monthly_salary == 0 ? '' : 'p.m.' }}
                                        @else
                                        <a href="/login" class="orange">Login </a>
                                        to view salary
                                        @endif
                                    </strong>
                                    <br>

                                    <a href="/vacancies/{{ $post->vacancyType->slug  }}" title="View {{ $post->vacancyType->name }} jobs">
                                        <span class="badge {{ $post->vacancyType->badge }}">
                                            @if($post->featured == 'true')
                                                <b>Featured </b> {{ $post->vacancyType->name }} <b> Job </b>
                                            @else
                                            {{ $post->vacancyType->name }}
                                            @endif
                                        </span>
                                    </a>
                                    <br>
                                    <a href="/vacancies/{{ $post->industry->slug }}" title="View {{ $post->industry->name }} jobs">
                                        <i class="fa fa-briefcase"></i> {{ $post->industry->name }}
                                    </a>
                                    <br>

                                    <span>Posted <span style="text-decoration: underline;">{{ $post->since }}</span></span>
                                </p>

                            </div>
                        </div>
                        <!-- JOB DESCRIPTION -->
                        <h5 class="pt-3 pb-2">Job Description</h5>
                        <div>
                            <?php echo $post->responsibilities; ?>
                        </div>
                    </div>
                </div>
                <!-- END OF JOB CARD -->
            </div>
            <!-- END OF ALL JOBS -->
            <!-- ACTIVE JOBS -->
            <div class="tab-pane fade" id="apply" role="tabpanel" aria-labelledby="apply-tab">
                <div class="card py-2 mb-4">
                    <div class="card-body">
                        <h5>Application Instructions</h5>

                        @guest
                            <p>
                                <a href="/login?redirectToPost={{ $post->slug }}" class="btn btn-orange-alt">Login</a> or <a href="/register?redirectToPost={{ $post->slug }}" class="btn btn-orange">Create Free Account</a> to apply for this position.
                            </p>
                            @if($post->how_to_apply == null || $post->externalSimpleApply())
                                <br>
                                <p style="text-align: center;">
                                    OR APPLY EASILY
                                </p>
                                <p>
                                    <form method="POST" action="/apply-easy/{{ $post->slug }}/" enctype="multipart/form-data">
                                        @csrf
                                        @if($post->externalSimpleApply())
                                            <input type="hidden" name="external_apply" value="{{ $post->externalSimpleApply() }}">
                                        @endif
                                        <div>
                                            <label>Full Name <strong class="text-danger">*</strong></label>
                                            <input type="text" name="name" maxlength="50" required="" class="form-control">
                                        </div>
                                        <div>
                                            <label>E-mail Address <strong class="text-danger">*</strong></label>
                                            <input type="email" name="email" maxlength="50" required="" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone_number">Phone Number <strong class="text-danger">*</strong></label>
                                            <div class="row pl-3">
                                                <select class="custom-select col-3" name="prefix">
                                                    @foreach(\App\Country::active() as $c)
                                                    <option value="{{ $c->id }}">
                                                        {{ $c->code }} {{ $c->prefix }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                <input type="number" required="" path="phone_number" value="{{ old('phone_number') }}" name="phone_number" id="phone_number" class="form-control col-8 ml-3" placeholder="7123123123"
                                                  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15" />
                                            </div>
                                        </div>
                                        <div>
                                            <label>Gender <strong class="text-danger">*</strong></label>
                                            <select name="gender" class="form-control">
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                                <option value="I">Other</option>
                                            </select>
                                        </div>

                                        <div>
                                            <label>Attach Resume <strong class="text-danger">*</strong> (.doc, .docx or .pdf) <small>(Max 5MB)</small> </label>
                                            <input type="file" name="resume" required="" accept=".doc, .docx,.pdf">
                                        </div>
                                        <br>
                                        <div>
                                            <input type="submit" value="Submit Application" class="btn btn-orange">
                                        </div>

                                    </form>
                                </p>
                            @endif
                        @else
                            @if(Auth::user()->role == 'seeker')
                                @if( $post->how_to_apply )
                                <div>
                                    <?php echo $post->how_to_apply; ?>
                                </div>
                                @else
                                <p>
                                    Follow the link below, submit your cover letter. Your current resume would be attached automatically. <br><br>
                                    <a href="/vacancies/{{ $post->slug }}/apply" class="btn btn-orange">Submit Application</a>

                                </p>
                                @endif
                            @else
                                <p>
                                    Only job seekers can apply for this position.
                                </p>
                            @endif

                        @endguest
                    </div>
                </div>
            </div>
            <!-- END OF ACTIVE JOBS -->
        </div>
    </div>
    <div class="col-lg-3 col-8 pt-2">
        <div class="card">
            <div class="card-body text-center">
                <img src="{{ asset($post->company->logoUrl) }}" alt="{{ $post->company->name  }}" class="circle-img">
                <h5>
                    <a href="/companies/{{ $post->company->name }}">{{ $post->company->name }}</a>
                </h5>
                <p><i class="fas fa-map-marker-alt orange"></i>
                    {{ $post->company->location->name.', '.$post->company->location->country->name }}
                </p>
                <p>{{ $post->company->staff }}</p>
            </div>
        </div>
    </div>
</div>

@endsection
