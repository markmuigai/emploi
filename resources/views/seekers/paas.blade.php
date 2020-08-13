@extends('layouts.seeker2')
@section('title','Get Hired on Emploi')
@section('description')
Register as a Professional, get access to Part-time Jobs on-demand.
@endsection


@section('content')

<?php
$user = isset(Auth::user()->id) ? Auth::user() : false;
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>

<link rel="stylesheet" href="/css/infinite-slider.css">
<link rel="stylesheet" href="/css/seeker.css">
<script type="text/javascript" src="/js/carousel.js">
</script>

<div class="pt-5 mt-3">
  <div class="container">
  </div>
</div>

<!-- index-block1 -->
<header class="pt-3" style="background: url(/images/gclub1.jpg); color:white; background-size: cover; background-attachment: fixed">
  <div class="content py-5">
    <div class="container">
      <div class="row align-items-center py-md-5 py-5">
        <div class="col-md-12 content-left pt-md-0 pt-5">
          <br><br><br><br><br>
          <h3 class="mt-3 mb-md-5 mb-4 h1">Join Talent Pool.</h3>
          <p class="mt-3 mb-md-5 mb-4 h5">Are you a professional looking for part-time work? <br> A new solution is here for you.</p>

          @if(isset(Auth::user()->id) && Auth::user()->role == 'seeker' && $user->seeker->isOnPaas())
          <!--          <h4>Assigned Tasks</h4>
            <p></p> -->
            @else
            <a href="/job-seekers/rpaas" style="background-color: #E15419" class="btn btn-theme">Join Golden Club</a>

          {{-- <a href="/job-seekers/rpaas" style="background-color: #E15419" class="btn btn-theme" id="request-part-timer" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Subscribe <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span></a> --}}
          @endif     
                 
        </div>
        
      </div>
      <div class="clear"></div>
    </div>
  </div>
</header>

<!-- //index-block1 -->

<!-- index-block2 -->

<!-- /index-block2 -->
<!-- content-with-photo17 -->
<section class="w3l-index-block3">
  <div class="section-info py-5">
    <div class="container py-md-3">
      <div class="row cwp17-two align-items-center">
        <div class="col-md-6 bg-light">
          <div class="container-fluid">
            <img src="/images/seeker-join.png" alt="">
          </div>
          {{-- <iframe src="https://www.youtube.com/embed/lJIrF4YjHfQ" style="height: 350px; width: 550px; !important;"></iframe> --}}
        </div>
        <div class="col-md-6 cwp17-text h4">
          <div class="h6">
            <p>PAAS is a service that seeks to provide qualified professionals on demand to
              handle specific tasks at affordable rates and at a cost effective plan.</p>
            <p>It is created to fulfill the need of employers for mid-level and senior
              positions that became vacant due to the COVID-19 pandemic.</p>
            <p>Lay-offs by companies led to reassessment of processes in the companies.
              PAAS seeks to connect experienced persons to the SMEs.
              It also provides a processing framework to SMEs and part-time professionals to effectively fill in the gap.</p>

          </div>

        </div>
      </div>
    </div>
  </div>
</section>

<section class="w3l-index-block2 py-2">

  <div class="container py-md-3">
    <div class="heading text-center mx-auto">
      <h3 class="head pt-1 pb-2">Top Benefits</h3>
    </div>
    <div class="row bottom_grids pt-md-3">
      <div class="col-lg-4 col-m-6 mt-5">
        <div class="s-block p-2">
          <img src="/images/zip/s3.png" alt="" class="img-fluid" />
          <h3 class="my-3">Placement</h3>
          <p class="">Guaranteed placement on an on-demand basis to more than one company.</p>
        </div>
      </div>

      <div class="col-lg-4 col-m-6 mt-5">
        <div class="s-block p-2">
          <img src="/images/zip/s1.png" alt="" class="img-fluid" />
          <h3 class="my-3">Productivity</h3>
          <p class="">Top quality performance: KPI & performance appraisal framework.</p>
        </div>
      </div>

      <div class="col-lg-4 col-m-6 mt-5">
        <div class="s-block p-2">
          <img src="/images/zip/s2.png" alt="" class="img-fluid" />
          <h3 class="my-3">Opportunities</h3>
          <p class="">Access to profession-based training and development opportunities</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6 mt-5">
        <div class="s-block p-2">
            <img src="/images/zip/s1.png" alt="" class="img-fluid" />
            <h3 class="my-3">Effective</h3>
            <p class="">Increased chances for eventual permanent employment.</p>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 mt-5">
        <div class="s-block p-2">
            <img src="/images/zip/s2.png" alt="" class="img-fluid" />
            <h3 class="my-3">Income</h3>
            <p class="">
              Guaranteed income after a successful placement.            
            </p>
        </div>
      </div>
      <div class="col-lg-4 col-m-6 mt-5">
          <div class="s-block p-2">
            <img src="/images/zip/s3.png" alt="" class="img-fluid" />
            <h3 class="my-3">Network.</h3>
            <p class="">Great networking opportunities with top employers.</p>
          </div>
      </div>


    </div>
  </div>

</section>
<!-- content-with-photo17 -->
 <div class="w3l-index-block4">
   <div class="features-bg py-5">
     <!-- features15 block -->
     <div class="container py-md-3">
       <div class="heading text-center mx-auto">
         <h3 class="head">Roadmap to Getting Hired</h3>
         <p class="my-3 head" style="color: #E15419">Subscribe to Golden Club Membership and work as you network.</p>
       </div>
       <div class="row">
         <div class="col-md-6 features15-col-text">
           <div class="d-flex flex-wrap feature-unit align-items-center">
             <div class="col-sm-3">
               <div class="features15-info">
                 <span class="fa fa-line-chart" aria-hidden="true"></span>
               </div>
             </div>
             <div class="col-sm-9 mt-sm-0 mt-4">
               <div class="features15-para">
                 <h4>Subscribe as a Part-timer</h4>
                 <p>To join the talent pool you first need to subscribe to Golden Club. It is from this pool that part-timers are selected.</p>
               </div>
             </div>
            </div>
         </div>
         <div class="col-md-6 features15-col-text">
           <div class="d-flex flex-wrap feature-unit align-items-center">
             <div class="col-sm-3">
               <div class="features15-info">
                 <span class="fa fa-graduation-cap" aria-hidden="true"></span>
               </div>
             </div>
             <div class="col-sm-9 mt-sm-0 mt-4">
               <div class="features15-para">
                 <h4>Receive Notification and Accept.</h4>
                 <p>Depending on your industry, you will receive notifications on employers request which you may accept or decline
                 </p>
               </div>
             </div>
            </div>
         </div>
         <div class="col-md-6 features15-col-text">
           <div class="d-flex flex-wrap feature-unit align-items-center">
             <div class="col-sm-3">
               <div class="features15-info">
                 <span class="fa fa-sort-alpha-asc" aria-hidden="true"></span>
               </div>
             </div>
             <div class="col-sm-9 mt-sm-0 mt-4">
               <div class="features15-para">
                 <h4>Get Matched and Shortlisted</h4>
                 <p>Our Role Suitability tool will be used to shortlist you. Employer then confirms.</p>
               </div>
             </div>
            </div>
         </div>
         <div class="col-md-6 features15-col-text">
           <div class="d-flex flex-wrap feature-unit align-items-center">
             <div class="col-sm-3">
               <div class="features15-info">
                 <span class="fa fa-star" aria-hidden="true"></span>
               </div>
             </div>
             <div class="col-sm-9 mt-sm-0 mt-4">
               <div class="features15-para">
                 <h4>End-to-End Support</h4>
                 <p>If you fit the description, we give you support to be successfully hired..</p>
               </div>
             </div>
            </div>
         </div>
         <div class="col-md-6 features15-col-text">
           <div class="d-flex flex-wrap feature-unit align-items-center">
             <div class="col-sm-3">
               <div class="features15-info">
                 <span class="fa fa-users" aria-hidden="true"></span>
               </div>
             </div>
             <div class="col-sm-9 mt-sm-0 mt-4">
               <div class="features15-para">
                 <h4>Featured Companies</h4>
                 <p>Top candidates seek vacancies from top companies. You can view the list of potential employers in the partners session..</p>
               </div>
             </div>
            </div>
         </div>
         <div class="col-md-6 features15-col-text">
           <div class="d-flex flex-wrap feature-unit align-items-center">
             <div class="col-sm-3">
               <div class="features15-info">
                 <span class="fa fa-laptop" aria-hidden="true"></span>
               </div>
             </div>
             <div class="col-sm-9 mt-sm-0 mt-4">
               <div class="features15-para">
                 <h4>Deal Closure</h4>
                 <p>After getting hired we take you through the code of conduct, contract signing and tools you are going to use for the project.</p>
               </div>
             </div>
            </div>
         </div>
       </div>
       <div>
         <!-- features15 block -->
       </div>
     </div>
   </div>
 </div>

 
<!-- PaaS Benefits -->


<!-- Partners Sections -->
<section class="w3l-index-block7 py-2">
<h3 class="head text-center p-2">Potential Employers</h3>
<div class="container">
      <div class="container pt-4 pb-4">
        <section class="customer-logos slider">
          <div class="slide"><img src="/images/logos/texas.webp"></div>
          <div class="slide"><img src="/images/logos/uniliver.webp"></div>
          <div class="slide"><img src="/images/logos/sanlam.webp"></div>
          <div class="slide"><img src="/images/logos/rvibs.webp"></div>
          <div class="slide"><img src="/images/logos/papaya.webp"></div>
          <div class="slide"><img src="/images/logos/neema.webp"></div>
          <div class="slide"><img src="/images/logos/mboga.webp"></div>
          <div class="slide"><img src="/images/logos/apa.webp"></div>
        </section>
      </div>
</div>
</section>


<!-- content-with-photo17 -->
<section class="w3l-index-block7 py-5">
  <div class="container py-md-3">
    <div class="row cwp17-two align-items-center">
      <div class="col-md-6 cwp17-text">
        <h2>Great features app
            that everyone Love</h2>
        <p>We enhance communication between employers and job seekers by configuring and automating responses giving your organization a professional outlook and giving job seekers appropriate feedback to advance their careers. Founded in 2017 as Jobsikaz and later rebranding to Emploi in 2019, we our goal is to impact 5 million job seekers in Africa by 2025. </p>
        <a href="/about">Read more about us &raquo;</a>
      </div>
      <div class="col-md-6 cwp17-image">
        <img src="/images/inspired.jpg" class="img-fluid" alt="Hire without Bias on Emploi" />
      </div>
    </div>
  </div>
</section>


<!-- subscribe modal -->
<section>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog p-5" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Subscription Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- subscribe form for Professional -->
            <form method="POST"  enctype="multipart/form-data" action="/job-seekers/subscribe-paas">
                @csrf
                <div class="form-group">
                    <label class="h5">First Name</label>
                    <input type="text" class="form-control" name="firstname" required="" placeholder="first name">
                </div>
                <div class="form-group">
                    <label class="h5">Last Name</label>
                    <input type="text" class="form-control" name="lastname" required="" placeholder="last name">
                </div>
                <div class="form-group">
                  <label class="h5">Industry</label>
                    <select path="industry" id="industry" name="industry" class="form-control input-sm">
                    @foreach($industries as $c)
                    <option value="{{ $c->id }}" @if(old('industry') && old('industry')==$c->id)
                    selected=""
                    @endif
                    >{{ $c->name }}</option>
                    @endforeach
                    </select>
                </div>

                <div class="form-group">
                  <label class="h5">Email Address</label>
                  <input type="email" class="form-control" name="email" required="" placeholder="Email">
                </div>
                <div class="form-group">
                  <label class="h5">Phone Number</label>
                  <input type="text" class="form-control" name="phone_number" required="" placeholder="Phone">
                </div>

                <div class="modal-footer">
                 <input type="submit" class="btn" style="background-color: #E15419; color: white;" name="button" value="Subscribe">
                  <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                </div>

              </form>
          </div>

        </div>
      </div>
    </div>


</section>



@endsection
