@extends('layouts.general-layout')

@section('title', $pageTitle)

@section('description')
Emploi is the Leading Platform for Talent Assessment and Matching for SME's in Africa.
@endsection

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>

@section('content')
<div class="container-fluid p-5">
    <h2 class="orange" style="text-align: center">Career Tips and Business Trends</h2>    
    <h5 style="text-align: center;">Get information and inspiration to help you achieve your career goals.</h5><br>
    <div class="row justify-content-between">
        <div class="col-lg-6 col-md-6 text-right">
            <form action="/blog/search" class="form-row">
                <input type="text" name="q" required="" class="form-control col-8 mr-2" placeholder="Search Blogs" value="{{ isset($q) ? $q : '' }}">
                <button type="submit" class="btn btn-orange col-3">Search</button>
            </form>
        </div>
        <div class="col-md-4 dropdown text-md-right text-left mt-2 mt-md-0">
            <button class="btn btn-orange dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Categories
            </button>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="/blog">All</a>
                @forelse(\App\BlogCategory::all() as $c)
                <a class="dropdown-item text-capitalize {{ isset($blogCategory) && $blogCategory == $c->id ? 'active' : '' }}" href="/blog/{{$c->slug}}">{{$c->name}}</a>
                @empty
                @endforelse
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <?php $adsCounter=0; ?>        
                @forelse($blogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="card my-2">
                            <div class="card-body">
                                <div class="blog-image lazy mb-2" data-bg="url({{ asset($blog->imageUrl) }})"></div>
                                <h5><a href="{{ url('blog/'.$blog->slug) }}">{{ $blog->title }}</a></h5>
                                <div class="d-flex">
                                    <p><i class="fas fa-user"></i> {{ $blog->user->name }} | <i class="fas fa-calendar-check"></i> {{ $blog->postedOn }}</p>
                                </div>
                                <a href="/blog/{{ $blog->category->slug }}"><span class="badge badge-orange">{{ $blog->category->name }}</span></a>
                                <p class="truncate">{!!html_entity_decode($blog->shortPreview)!!}</p>
                                <a href="{{ url('blog/'.$blog->slug) }}" class="orange">Read More</a>
                                <hr>
                                <button class="btn btn-orange-alt" data-toggle="modal" data-target="#socialModal{{ $blog->id }}"><i class="fas fa-share-alt"></i> Share</button>
                                <!-- SHARE MODAL -->
                                @include('components.share-modal')
        
                                <span style="float: right;">
                                    <?php $likes = \App\Like::getCount('blog',$blog->id); ?>
                                    @if($likes == 1)
                                        <b>1 Like</b>
                                    @else
                                        {{ $likes }} <b>Likes</b>
                                    @endif 
        
                                    |
                                    
                                    @guest
                                        <a href="/login" title="Login to Like">Login to Like</a>
                                    @else
                                        @if(Auth::user()->hasLiked('blog',$blog->id))
        
                                            <a href="/likes/blog/{{ $blog->slug }}" style="color: #500095" title="Unlike Blog">
                                                <i class="fa fa-thumbs-up"></i> Unlike
                                            </a>
                                        @else
                                            <a href="/likes/blog/{{ $blog->slug }}" title="Like Blog">
                                                <i class="fa fa-thumbs-up"></i> Like
                                            </a>
                                        @endif
                                    @endguest
                                    
                                <!--  <form method="POST" action="blog/comment/{$id}">
                                            @csrf
                                        
        
                                                <div class="form-group">
                                                <textarea id="comment" rows="2" class="form-control" name="comment" placeholder="Write a comment" required autofocus></textarea>
                                                </div>
                                                <div class="form-group">
                                                <button type="submit" class="btn btn-success btn-sm btn-block">Comment</button>
                                                </div>
                                    </form>  -->
        
                                </span>
                                <!-- END OF SHARE MODAL -->
                            </div>
                        </div>
                    </div>
                @empty
                <div class="col-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <p>No blogs found</p>
                        </div>
                    </div>
                </div>
                @endforelse 
                <?php $adsCounter++; ?>
                @if($adsCounter %3 == 0)
                    <div class="row mb-4">
                        <div class="card-body" style="padding: 0px; height: 89px">
                            @if($agent->isMobile())
                                @include('components.ads.mobile_400x350')
                            @else            
                                @include('components.ads.flat_728x90')
                            @endif
                        </div>
                    </div>  
                @endif
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mt-2 mb-3">
                <div class="card-body">
                    <h5><a class="text-primary" href="/v2/job-seekers/cv-editing/create">Professional CV Editing</a></h5>
                    <p>
                        For a detailed, targeted, concise and well-presented CV, talk to our CV Editing experts.
                    </p>
                </div>
            </div>
            <div class="card mt-2 mb-3">
                <div class="card-body">
                    <h5><a class="text-primary" href="/job-seekers/cv-builder">Free CV builder</a></h5>
                    <p>
                        Create your resume in no time at all!
                    </p>
                </div>
            </div>
            <div class="card mt-2 mb-3">
                <div class="card-body">
                    <h5><a class="text-primary" href="/job-seekers/cv-templates">  Downloadable CV templates with advice</a></h5>
                    <p>
                        Choose a resume that suits your professional profile
                    </p>
                </div>
            </div>
            <div class="card mt-2 mb-3">
                <div class="card-body">
                    <h5><a class="text-primary" href="/job-seekers/cv-templates">Exclusive Placement</a></h5>
                    <p>
                        Get seen by employers as we rank you on top of the employer search list. We offer exclusive placement services matching your career and Interview
                        coaching to land your dream job.
                    </p>
                </div>
            </div>
            <div class="card mt-2 mb-3">
                <div class="card-body">
                    <h5>
                        @if (auth()->user() && auth()->user()->role == 'seeker')
                            <a class="text-primary" href="/v2/self-assessments/create">Self Assessment</a>
                        @else
                        <a class="text-primary" type="button" data-toggle="modal" data-target="#selfAssessmentModal">
                            Self Assessment
                        </a>
                        @endif
                    </h5>
                    <p>
                        Improve your job score ranking with intriguing psychometric tests!
                    </p>
                </div>
            </div>
            @include('v2.components.get-help')
        </div>
    </div>

    <div class="advertise-here container-fluid">
        <div class="row justify-content-center">
          <div class="col-md-10 col-sm-12">
            <div class="card border shadow p-3 animate__animated animate__pulse animate__infinite  infinite animate__slow  10s">
              <h1 class="text-center">
                <a href="{{route('advertise.create')}}">Click to advertise here</a></h1>
            </div>
          </div>
        </div>
      </div>
   
    <div>
        {{ $blogs->links() }}
    </div><br><br>
        <div class="col-md-12" >
            <h4 class="orange" style="text-align: center;">Career Videos</h4>
            <div class="row">
                <div class="col-md-4 card">
                     <iframe src="https://www.youtube.com/embed/7pj-dCfYptc" frameborder="0" allowfullscreen></iframe>                    
                            <h4>Technology and Employment: Our CEO's interview with Ndereva Hillary of Y254 TV</h4>
                            <p>Conversations around, the future of work, What is @emploi.co doing to help job seekers cope during this transition.?
                            </p>                       
                </div>
                <div class="col-md-4 card">
                     <iframe src="https://www.youtube.com/embed/BVJ4punLoMc" frameborder="0" allowfullscreen></iframe>                    
                            <h4><a href="/job-seekers/summit"> Resume Tips-Make Yourself a Stronger Candidate Today!</a></h4>
                            <p>Here is Maggie giving insight into Emploi's CV editing service. LISTEN, SIGN UP AND GET HIRED TODAY.
                            </p>                       
                </div>
                <div class="col-md-4 card">
                     <iframe src="https://www.youtube.com/embed/E6dTmonX6Vk" frameborder="0" allowfullscreen></iframe>                    
                            <h4><a href="/job-seekers/services">Emploi Services-Land that dream job Today!</a></h4>
                            <p>Is your job search proving tough? Make it easier by signing up at Emploi.co today! 
                            </p>                       
                </div>
                <div class="col-md-4 card">
                     <iframe src="https://www.youtube.com/embed/fMkCW5yIYLs" frameborder="0" allowfullscreen></iframe>                   
                            <h4>The future of jobs amid the job losses during COVID-19</h4>
                            <p>A live conversation with CEO of Emploi, Sophy Mwale, and Simba Elijah Charles of Metropol TV on the future of jobs.
                            </p>                       
                </div>
            </div>                      
        </div>               
                

</div>

<!-- SEARCH BAR -->
<div class="position-relative ">
    @include('components.search-form')
</div>
<!-- END OF SEARCH BAR -->
@endsection

@section('modal')
    @include('v2.components.modals.self-assessment')
@endsection
