@extends('layouts.seek')

@section('title','Welcome to Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')

<div class="banner" style="">
    <div class="container">
        <div id="search_wrapper">
         <div id="search_form" class="clearfix">
         <h1>Start your job search</h1>
         @include('components.search-form')           
            <h2 class="title" style="display: none;">Top Categories</h2>
         </div>
         <div id="city_1" class="clearfix row">
          <p>
            Loremp ipsum dolor sit amet Loremp ipsum dolor sit amet Loremp ipsum dolor sit amet Loremp ipsum dolor sit amet Loremp ipsum dolor sit amet Loremp ipsum dolor sit amet 
          </p>
          <p>
            <a class="btn-orange" href="/join">REGISTER</a>
          </p>
             <ul class="orange col-md-4" style="display: none;">
                @foreach(\App\Industry::top() as $i)
                 <li>
                 <a href="/vacancies/{{ $i->slug }}">{{ $i->name }}</a>
                 </li>
                 @endforeach
                 
             </ul>
             <ul class="orange col-md-4" style="display: none;">
                @foreach(\App\Location::top() as $i)
                 <li>
                 <a href="/vacancies/{{ $i->slug }}">{{ $i->name }}</a>
                 </li>
                 @endforeach
             </ul>
             
         </div>
       </div>
   </div> 
</div>  
<div class="container">
  <div class="grid_1">
        <h3>Why Emploi</h3>
        <p style="text-align: center;">
          Loremp ipsum dolor sit amet Loremp ipsum dolor sit amet Loremp ipsum dolor sit amet Loremp ipsum dolor sit amet Loremp ipsum dolor sit amet Loremp ipsum dolor sit amet. Loremp ipsum dolor sit amet Loremp ipsum dolor sit amet Loremp ipsum dolor sit amet Loremp ipsum dolor sit amet Loremp ipsum dolor sit amet ... <a href="/about">Learn more</a>
        </p>
  </div>
</div>
<div class="container">
  <div class="grid_1 row">
    <div class="col-md-8 row">
      <h3>Our Services</h3>
      <div class="card col-md-6">
        <img class="card-img-top" src="images/employer-join.png" style="width: 100%" alt="Employer Services">
        <div class="card-body">
          <h5 class="card-title" style="font-weight: bold">Employers</h5>
          <p class="card-text" style="display: none">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Browse Talent Database</li>
          <li class="list-group-item">Recruitment Process Outsourcing</li>
          <li class="list-group-item">Assess Candidates</li>
          <li class="list-group-item">Advertise Jobs</li>
          <li class="list-group-item">Background Checks</li>
        </ul>
        <div class="card-body">
          <a href="/employers/register" class="card-link">Employer Registration</a>
        </div>
      </div>
      <div class="card col-md-6">
        <img class="card-img-top" src="images/seeker-join.png" style="width: 100%" alt="Job Seeker Services">
        <div class="card-body">
          <h5 class="card-title" style="font-weight: bold">Job Seekers</h5>
          <p class="card-text" style="display: none">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Premium Placement</li>
          <li class="list-group-item">Professional Coaching</li>
          <li class="list-group-item">Job Vacancies</li>
          <li class="list-group-item">Professional CV Editing</li>
          <li class="list-group-item">Career Centre</li>
        </ul>
        <div class="card-body">
          <a href="/register" class="card-link">Job Seeker Registration</a>
        </div>
      </div>
      
    </div>
    <div class="col-md-4">
      <div class="fb-page" data-href="https://www.facebook.com/jobsikaz" data-tabs="timeline" data-width="" data-height="" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/jobsikaz" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/jobsikaz">JobSikaz</a></blockquote></div>
    </div>
        
        
  </div>
</div>
<div class="about_middle">
  <div class="container">
         <div class="wmuSlider example1">
         <div class="wmuSliderWrapper">
             <h3>Latest Blogs</h3>
              @forelse($blogs as $blog)
               <article style="position: absolute; width: 100%; opacity: 0;"> 
                    <div class="banner-wrap">
                      <ul class="grid-1">
                      <li class="grid-1_left">
                        <a href="{{ url('blog/'.$blog->slug) }}">
                          <img src="{{ asset($blog->imageUrl) }}" class="img-responsive" alt=""/>
                        </a>
                      </li>
                      <li class="grid-1_right">
                        <a href="{{ url('blog/'.$blog->slug) }}" style="text-decoration: none;">
                          <p>{{ $blog->title }}</p>
                        </a>
                          <h4><a href="{{ url('blog/'.$blog->slug) }}">{{ $blog->user->name }}</a>
                           | {{ $blog->category->name }}</h4>
                      </li>
                      <div class="clearfix"> </div>
                    </ul>
                    </div>
              </article>

              @empty
              @endforelse
           
         </div>
        <ul class="wmuSliderPagination">
                  <li><a href="#" class="">0</a></li>
                  <li><a href="#" class="">1</a></li>
                  <li><a href="#" class="wmuActive">2</a></li>
                </ul>
            </div>
            <script src="js/jquery.wmuSlider.js"></script> 
        <script>
            $('.example1').wmuSlider();         
           </script>                    
      </div>
</div>
<div class="container">
  <div class="grid_1">
     <h3>Featured Employers</h3>
       <ul id="flexiselDemo3">
          <li><img src="images/Africote.png"  class="img-responsive" /></li>
          <li><img src="images/Batiment-group-limited.png"  class="img-responsive" /></li>
          <li><img src="images/Cartridge-mania.png"  class="img-responsive" /></li>
          <li><img src="images/Jubilee-insurance.png"  class="img-responsive" /></li>
          <li><img src="images/Kendirita-tours-and-travel.png"  class="img-responsive" /></li>
          <li><img src="images/Sprout-ke.png"  class="img-responsive" /></li>  
        </ul>
        <script type="text/javascript">
         $(window).load(function() {
            $("#flexiselDemo3").flexisel({
                visibleItems: 6,
                animationSpeed: 1000,
                autoPlay:false,
                autoPlaySpeed: 3000,            
                pauseOnHover: true,
                enableResponsiveBreakpoints: true,
                responsiveBreakpoints: { 
                    portrait: { 
                        changePoint:480,
                        visibleItems: 1
                    }, 
                    landscape: { 
                        changePoint:640,
                        visibleItems: 2
                    },
                    tablet: { 
                        changePoint:768,
                        visibleItems: 3
                    }
                }
            });
            
        });
       </script>
       <script type="text/javascript" src="js/jquery.flexisel.js"></script>
     </div>
     <div class="single">  
       
       <div class="col-md-8">
          <h2>Latest Vacancies</h2>
            @forelse($posts as $p)
          <div class="col_1">
            <div class="col-sm-4 row_2">
                <a href="/vacancies/{{ $p->slug }}"><img src="images/a1.jpg" class="img-responsive" alt=""/></a>
            </div>
            <div class="col-sm-8 row_1">
                <h4>
                  <a href="/vacancies/{{ $p->slug }}">{{ $p->title }}</a>
                </h4>
                <h6>{{ $p->location->name }} <span class="dot">-</span> {{ $p->since }}</h6>
                <p>{{ $p->brief }}</p>
                
                <i>Apply within <b><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($p->deadline))->diffForHumans() ?></b> </i>
                <a href="/vacancies/{{$p->slug}}/" class="btn btn-sm read-more">Read More</a>
                <a href="/vacancies/{{$p->slug}}/apply" class="btn btn-sm btn-success pull-right" style="color: white">Apply</a>
                <div class="social">    
                    <a class="btn_1" href="http://www.facebook.com/sharer.php?u={{ url('/vacancies/'.$p->slug) }}" target="_blank">
                        <i class="fa fa-facebook fb"></i>
                        <span class="share1 fb">Share</span>                                
                    </a>
                    <a class="btn_1" href="https://twitter.com/share?url={{ url('/vacancies/'.$p->slug) }}&amp;text={{ urlencode($p->title) }}&amp;hashtags=Emploi{{ $p->location->country->code }}" target="_blank">
                        <i class="fa fa-twitter tw"></i>
                        <span class="share1">Tweet</span>                               
                    </a>
                    <a class="btn_1" href="http://www.linkedin.com/shareArticle?mini=true&amp;url={{ url('/vacancies/'.$p->slug) }}" target="_blank">
                        <i class="fa fa-linkedin fb"></i>
                        <span class="share1 fb">Share</span>
                    </a>
               </div>
            </div>
            <div class="clearfix"> </div>
           </div>
           @empty

           <p>No job posts available</p>

           @endforelse
           
           
           
           
           <div class="col_2">
             
            
            <div class="clearfix"> </div>
           </div>
       </div>
       <div class="col-md-4">
          @include('left-bar')
          
     </div>
       <div class="clearfix"> </div>
     </div>
</div>


<div class="about_middle">
  <div class="container">
         <div class="wmuSlider example1">
         <div class="wmuSliderWrapper">
             <h3>Testimonials</h3>
           <article style="position: absolute; width: 100%; opacity: 0;"> 
                <div class="banner-wrap">
                  <ul class="grid-1">
                  <li class="grid-1_left">
                    <img src="images/f5.jpg" class="img-responsive" alt=""/>
                  </li>
                  <li class="grid-1_right">
                    <p>Garcinia cambogia is one of the main 
                    components in one of the best-selling 
                    supplemental weight loss products, 
                    Hydroxycut., and researchers have 
                    concluded that "the evidence for G. 
                    cambogia is not compelling.</p>
                      <h4><a href="#">annette Doe</a> | Abc Company</h4>
                  </li>
                  <div class="clearfix"> </div>
                </ul>
                </div>
          </article>
           <article style="position: absolute; width: 100%; opacity: 0;"> 
                <div class="banner-wrap">
                  <ul class="grid-1">
                  <li class="grid-1_left">
                    <img src="images/f6.jpg" class="img-responsive" alt=""/>
                  </li>
                  <li class="grid-1_right">
                    <p>Garcinia cambogia is one of the main 
                    components in one of the best-selling 
                    supplemental weight loss products, 
                    Hydroxycut., and researchers have 
                    concluded that "the evidence for G. 
                    cambogia is not compelling.</p>
                      <h4><a href="#">annette Doe</a> | Abc Company</h4>
                  </li>
                  <div class="clearfix"> </div>
                </ul>
                </div>
          </article>
           <article style="position: absolute; width: 100%; opacity: 0;"> 
                <div class="banner-wrap">
                  <ul class="grid-1">
                  <li class="grid-1_left">
                    <img src="images/f7.jpg" class="img-responsive" alt=""/>
                  </li>
                  <li class="grid-1_right">
                    <p>Garcinia cambogia is one of the main 
                    components in one of the best-selling 
                    supplemental weight loss products, 
                    Hydroxycut., and researchers have 
                    concluded that "the evidence for G. 
                    cambogia is not compelling.</p>
                      <h4><a href="#">annette Doe</a> | Abc Company</h4>
                  </li>
                  <div class="clearfix"> </div>
                </ul>
                </div>
          </article>
         </div>
        <ul class="wmuSliderPagination">
                  <li><a href="#" class="">0</a></li>
                  <li><a href="#" class="">1</a></li>
                  <li><a href="#" class="wmuActive">2</a></li>
                </ul>
            </div>
            <script src="js/jquery.wmuSlider.js"></script> 
        <script>
            $('.example1').wmuSlider();         
           </script>                    
      </div>
</div>

@include('components.statistics')

@endsection