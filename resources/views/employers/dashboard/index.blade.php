@extends('layouts.seek')

@section('title','Emploi :: Dashboard')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="container">
    <div class="single">  
       <div class="box_1" style="margin-bottom: 1em; border-bottom: 0.1em solid black">
       	<h3>Dashboard
       		<a class="btn btn-sm btn-success pull-right" href="/contact" target="_blank">
            <i class="fa fa-phone"></i>
            Contact us
            
        </a>
       	</h3>


        
       </div>

       
    
    <div class="row" style="width: 98%; margin: 0 1%; ">
        <div class="card col-md-4" style="border-bottom: 0.1em solid black; padding-bottom: 0.5em;">
            <div class="card-body">
                <h4 class="card-title" style="font-weight: bold;">Advertise Jobs</h4>
                <p class="card-text">Advertise your job to an audience of over 100,000 on our jobseeker database and social media.</p>
                
                <a href="/vacancies/create" class="btn btn-sm btn-primary"><i class="fa fa-briefcase"></i> Create Advert</a>
                <a href="/employers/publish" class="btn btn-sm btn-success pull-right"><i class="fa fa-info-circle"></i> Learn More </a>
            </div>
        </div>
        <div class="card col-md-4" style="margin-bottom: 2em; border-bottom: 0.1em solid black; padding-bottom: 0.5em">
            <div class="card-body">
                <h4 class="card-title" style="font-weight: bold;">Applications</h4>
                <p class="card-text">Conduct shortlisting of applications, schedule interviews and select candidate with Role Suitability Index assistance</p>
                @if(count(Auth::user()->posts) > 0)
                <select class="btn btn-sm btn-success" style="width: 60%" id="applications-slug">
                    @foreach(Auth::user()->posts as $i)
                    <option value="{{ $i->slug }}">{{ $i->title }} || {{ $i->status }}</option>
                    @endforeach
                    
                </select>
                <button class="btn btn-sm btn-primary" id="applications-slug-btn">View</button>
                <button class="btn btn-sm btn-info" id="applications-slug-btn2">Edit</button>
                <script>
                    $(function(){
                        $('#applications-slug-btn').click(function(){
                            var slug = $('#applications-slug').val();
                            window.location = '/employers/applications/'+slug;
                        });
                        $('#applications-slug-btn2').click(function(){
                            var slug = $('#applications-slug').val();
                            window.location = '/vacancies/'+slug+'/edit';
                        });
                    });
                </script>
                @else
                <p>No Posts created yet. <a href="/employers/publish">Create Job Post</a></p>
                @endif
            </div>
        </div>
        <div class="card col-md-4" style="margin-bottom: 2em; border-bottom: 0.1em solid black; padding-bottom: 0.5em">
            <div class="card-body">
                <h4 class="card-title" style="font-weight: bold;">Browse CVs</h4>
                <p class="card-text">Sift through our database and identify potential job seekers for quick shortlisting and hiring</p>
                <br>
                <select class="btn btn-sm btn-success" style="width: 60%" id="browse-cv-industry">
                    <option value="">All Job Seekers</option>
                    @foreach($industries as $i)
                    <option value="{{ $i->slug }}">{{ $i->name }}</option>
                    @endforeach
                    
                </select>
                <button class="btn btn-sm btn-primary" id="browse-cv-button">Browse</button>
                <script>
                    $(function(){
                        $('#browse-cv-button').click(function(){
                            var ind = $('#browse-cv-industry').val();
                            window.location = '/employers/browse/?industry='+ind;
                        });
                    });
                </script>
            </div>
        </div>
        
        <div class="card col-md-4" style="margin-bottom: 2em; border-bottom: 0.1em solid black; padding-bottom: 0.5em; display: none">
            <div class="card-body">
                <h4 class="card-title" style="font-weight: bold;">CV Requests</h4>
                <p class="card-text">View requests for candidates full profiles, download candidates' resume and contact them directly</p>
                <select class="btn btn-sm btn-success" style="width: 60%" id="cv-request-industry">
                    <option value="-1">All</option>
                    @foreach($industries as $i)
                    <option value="{{ $i->id }}">{{ $i->name }}</option>
                    @endforeach
                    
                </select>
                <button class="btn btn-sm btn-primary" id="cv-request-button">View</button>
                <script>
                    $(function(){
                        $('#cv-request-button').click(function(){
                            var ind = $('#cv-request-industry').val();
                            ind = ind == -1 ? '' : ind;
                            window.location = '/employer/resume/requests/'+ind;
                        });
                    });
                </script>
            </div>
        </div>
        
        
        
        <div class="card col-md-4" style="border-bottom: 0.1em solid black; padding-bottom: 0.5em; display: none;">
            <div class="card-body">
                <h4 class="card-title" style="font-weight: bold;">
                    Candidate Vetting
                </h4>
                <p class="card-text">We conduct Psychometric tests, Background Checks and Preliminary interviews for secure hires.</p>
                
                <a href="https://cv-portal.jobsikaz.com/employer/candidate-vetting" class="btn btn-sm btn-success">View</a>
                
                <a href="/employers/premium-recruitment" target="_blank" class="btn btn-sm btn-primary pull-right mr-1"><i class="fa fa-star"></i> Premium Recruitment</a>
            </div>
        </div>
        
        <div class="card col-md-4" style="border-bottom: 0.1em solid black; padding-bottom: 0.5em; display: none;">
            <div class="card-body">
                <h4 class="card-title" style="font-weight: bold;">Saved CVs</h4>
                <p class="card-text">Easily access and retrieve profiles you have saved for quick access.</p>
                <br>
                <select class="btn btn-sm btn-success" style="width: 60%" id="saved-industry">
                    <option value="-1">All</option>
                    @foreach($industries as $i)
                    <option value="{{ $i->id }}">{{ $i->name }}</option>
                    @endforeach
                    
                </select>
                <button class="btn btn-sm btn-primary" id="saved-button">View</button>
                <script>
                    $(function(){
                        $('#saved-button').click(function(){
                            var ind = $('#saved-industry').val();
                            window.location = '/account/cart/'+ind;
                        });
                    });
                </script>
            </div>
        </div>
        
        
        
        
        
        <div class="card col-md-4" style="display: none">
            <div class="card-body">
                <h5 class="card-title">Notes</h5>
                <p class="card-text">Draft personal notes and save them for your own reference</p>
                <br>
                <a href="/dashboard/notes/create" class="btn btn-sm btn-primary">Create</a>
                <a href="/dashboard/notes" class="btn btn-sm btn-success">View All</a>
            </div>
        </div>
    </div>
       
	</div>
</div>

@endsection