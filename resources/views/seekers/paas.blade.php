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


<!-- index-block1 -->
<div class="w3l-index-block1">
  <div class="content py-5">
    <div class="container">
      <div class="row align-items-center py-md-5 py-3">
        <div class="col-md-5 content-left pt-md-0 pt-5">
          <h3 class="mt-3 mb-md-5 mb-4 h1">Join Talent Pool.</h3>
          <p class="mt-3 mb-md-5 mb-4">Are you a professional looking for part-time work? A new solution is here for you.</p>



                 @if(isset(Auth::user()->id) && Auth::user()->role == 'seeker' && $user->seeker->isOnPaas())
        <!--          <h4>Assigned Tasks</h4>
                 <p></p> -->
                 @else
                 <a href="/job-seekers/rpaas" style="background-color: #E15419" class="btn btn-theme">Join Gold Club</a>

                {{-- <a href="/job-seekers/rpaas" style="background-color: #E15419" class="btn btn-theme" id="request-part-timer" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Subscribe <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span></a> --}}
                @endif
        
              
          
        </div>
        <div class="col-md-7 content-photo mt-md-0 mt-5">
          <img src="/images/zip/main.jpg" class="img-fluid" alt="main image">
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</div>
<!-- //index-block1 -->
<!-- index-block2 -->

<!-- /index-block2 -->
<!-- content-with-photo17 -->
<section class="w3l-index-block3">
  <div class="section-info py-5">
    <div class="container py-md-3">
      <div class="row cwp17-two align-items-center">
        <div class="col-md-6">
          <iframe src="https://www.youtube.com/embed/lJIrF4YjHfQ" style="height: 350px; width: 550px; !important;"></iframe>
        </div>
        <div class="col-md-6 cwp17-text h4">
          <div class="h6">
            <p>PAAS is a service that seeks to provide qualified professionals on demand to
              handle specific tasks at affordable rates and at a cost effective plan.</p>
            <p>It is created to fulfill the need of employers for mid-level and senior
              positions that became vacant due to theCOVID-19 pandemic.</p>
            <p>Lay-offs by companies led to reassessment of processes in the companies.
              PAAS seeks to connect experienced persons to the SMEs.
              It also provides a processing framework to SMEs and part-time professionals to effectively fill in the gap.</p>

          </div>

          <!-- Large modal describing paas -->

          <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg p-2">
            <div class="modal-content p-4">
               <h1 class="bg-light">Product Description</h1>

               <div class="h5">
                 PAAS is a service that seeks to provide qualified professionals on demand to
                 handle specific tasks at affordable rates and at a cost effective plan.
                 <br><br>
                 It is created to fulfill the need of employers for mid-level and senior
                 positions that became vacant due to theCOVID-19 pandemic.
                 <br><br>
                 Lay-offs by companies led to reassessment of processes in the companies.
                 PAAS seeks to connect experienced persons to the SMEs.
                 It also provides a processing framework to SMEs and part-time professionals to effectively fill in the gap


               </div>

               <div class="modal-footer">
                 <button type="button" class="btn btn-orange">Contact Us</button>
                 <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
               </div>

            </div>
          </div>
          </div>

        </div>
        {{-- end of description modal --}}
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
         <p class="my-3 head">To use PaaS you first need to subscribe for a membership, afterwards you can then create a request for a part-timer afterwhich Emploi will take care of the rest of the process.</p>
       </div>
       <div class="row">
         <div class="col-md-6 features15-col-text">
           <a href="#url" class="d-flex flex-wrap feature-unit align-items-center">
             <div class="col-sm-3">
               <div class="features15-info">
                 <span class="fa fa-line-chart" aria-hidden="true"></span>
               </div>
             </div>
             <div class="col-sm-9 mt-sm-0 mt-4">
               <div class="features15-para">
                 <h4>Subscribe as a Part-timer</h4>
                 <p>To join the talent pool you first need to subscribe to the talnt pool.</p>
               </div>
             </div>
           </a>
         </div>
         <div class="col-md-6 features15-col-text">
           <a href="#url" class="d-flex flex-wrap feature-unit align-items-center">
             <div class="col-sm-3">
               <div class="features15-info">
                 <span class="fa fa-graduation-cap" aria-hidden="true"></span>
               </div>
             </div>
             <div class="col-sm-9 mt-sm-0 mt-4">
               <div class="features15-para">
                 <h4>Receive Request Notification and Action.</h4>
                 <p>Depending on your industry, you will receive notifications on employers request. From the email you receive
                     you may accept or reject the proposal.
                 </p>
               </div>
             </div>
           </a>
         </div>
         <div class="col-md-6 features15-col-text">
           <a href="#url" class="d-flex flex-wrap feature-unit align-items-center">
             <div class="col-sm-3">
               <div class="features15-info">
                 <span class="fa fa-sort-alpha-asc" aria-hidden="true"></span>
               </div>
             </div>
             <div class="col-sm-9 mt-sm-0 mt-4">
               <div class="features15-para">
                 <h4>Shortlist Management</h4>
                 <p>Our Role Suitability tool and other features enable you to score job applications against your model candidate and rank them for advanced shortlisting</p>
               </div>
             </div>
           </a>
         </div>
         <div class="col-md-6 features15-col-text">
           <a href="#url" class="d-flex flex-wrap feature-unit align-items-center">
             <div class="col-sm-3">
               <div class="features15-info">
                 <span class="fa fa-star" aria-hidden="true"></span>
               </div>
             </div>
             <div class="col-sm-9 mt-sm-0 mt-4">
               <div class="features15-para">
                 <h4>End-to-End Support</h4>
                 <p>If you fit the description, we guide you through the interviewing session with employer so that you get hired.</p>
               </div>
             </div>
           </a>
         </div>
         <div class="col-md-6 features15-col-text">
           <a href="#url" class="d-flex flex-wrap feature-unit align-items-center">
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
           </a>
         </div>
         <div class="col-md-6 features15-col-text">
           <a href="#url" class="d-flex flex-wrap feature-unit align-items-center">
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
           </a>
         </div>
       </div>
       <div>
         <!-- features15 block -->
       </div>
     </div>
   </div>
 </div>

 
<!-- PaaS Benefits -->

<section class="w3l-index-block7 py-5">
  <div class="container py-md-3">
    <div class="heading text-center mx-auto">
      <h3 class="head">PaaS Benefits</h3>
      <h5 class="my-3">Sign up for membership now and get part time employment.</h5>
    </div>

    <div class="row cwp17-two align-items-center">
      <div class="col-md-6 cwp17-text">
            <div class="card-header bg-white shadow-sm">
              <div class="h2 mb-3" style="color: #E15419">
                KSHs. 2750 Annually
              </div>

            </div>
            
            <div class="card-body pt-4 pr-3 h6">
              <ul>
                <li>Full Year Membership</li>
                <li>End-to-End Recruitment Support</li>
                <li>Top Companies</li>
                <li>On-Demand Basis</li>
              </ul>
            </div>
            <div class="mx-auto">
              <button class="btn mx-auto" style="background-color: #E15419; color: white"  name="submit" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Subscribe</button>
            </div>

      </div>

      <div class="col-md-6 cwp17-text mx-auto">
        <div>
          <div class="col-sm-12">
                <ul class="list-group">
                  <li class="list-group-item">Guaranteed placement on an on-demand basis to one or more companies thus continuity in practicing their profession.</li>
                  <li class="list-group-item">Access to profession-based training and development opportunities under the Know Your Profession program.</li>
                  <li class="list-group-item">Increased chances for eventual permanent employment.</li>
                  <li class="list-group-item">Guaranteed income after a successful placement.</li>
                  <li class="list-group-item">Great networking opportunities with company heads, HODs and entrepreneurs as well as other professionals.</li>
                  
                </ul>

          </div>

        </div>
      </div>
      
    </div>
  </div>
</section>

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
