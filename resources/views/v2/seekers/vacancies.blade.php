@extends('v2.layouts.app')

@section('title', $title .' :: Emploi')

@section('content')
    <!-- Navbar -->
    @include('v2.components.jobseeker.navbar')
    <!-- End Navbar -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<style>
  .banner{
    background: purple;
    height: 10vh;
    display: flex;
    align-items: center
  }

  .banner a{
    text-decoration: none;
    transition: 2s;
  }

  .banner h5{
    color: #fff;
    font-weight: 900;
    text-align: center;
    margin: 0;
  }
 </style>

 <script>
  $(document).ready(function(){
   setTimeout(function(){
       $('#myModal').modal('show');
   }, 20000);
  });
  
</script>
    <!-- Jobs -->
    <div class="job-area-list dashboard-area mt-1 ptb-100">
        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-lg-3">
                    @include('v2.components.sidebar.jobseeker')
                       @if (auth()->user() && auth()->user()->role == 'seeker')                
                       <br><br> <h4 class="heading-filter ml-4">Filter By</h4>
                       <div class="sorting-menu float-left">
                            <ul> 
                                <li class="filter pb-2 ml-4" data-filter=".{{isset(auth()->user()->seeker->location->country_id)}}">
                                    <i class="bx bxs-location-plus"></i>  My Country
                                    <i class="flaticon-right-arrow two"></i></li><hr>

                                <li class="filter pb-2 ml-4" data-filter=".{{isset(auth()->user()->seeker->location_id)}}">
                                    <i class="flaticon-placeholder"></i>  My Location
                                 <i class="flaticon-right-arrow two"></i></li><hr>

                                <li class="filter pb-2 ml-4" data-filter=".{{auth()->user()->seeker->industry_id}}">
                                    <i class="flaticon-resume"></i>  My Industry
                                  <i class="flaticon-right-arrow two"></i></li><hr>                           
                            </ul>                  
                        </div>                 
                        @endif
                </div>           
                <div class="{{auth()->user() ? 'col-lg-9' : 'col-lg-12' }} jobs-form">
                    <div class="container pt-3 pb-3">                    
                        <button class="btn btn-success mb-1"><a href="{{Route('v2.cv-review.create')}}"><span style="color: white"> Automatic CV Review</i></span></a></button>
                        @if (auth()->user() && auth()->user()->role == 'seeker')
                            <button class="btn btn-success mb-1"><a href="{{route('v2.self-assessment.create')}}"><span style="color: white">  Self Assessment</i></span></a></button>
                        @else
                            <button class="btn btn-success mb-1"><a href="#" data-toggle="modal" data-target="#selfAssessmentModal"><span style="color: white">  Self Assessment</i></span></a></button>
                        @endif
                    </div>
                    <div class="{{ auth()->user() ? 'col-lg-12' : 'col-lg-10'}}">
                        <h3 style="text-align: center">Get all the latest jobs at one stop and apply.</h3>
                    </div>
                    <!-- Jobs -->
                    <div class="categories-area pt-2 pb-70">
                        <div class="container-fluid"> 
                            <div class="row">
                                @guest
                                <div class="col-lg-2">
                                    <br><br>
                                    <h4>Filter By</h4>
                                     <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                      <a class="nav-link" id="v-pills-messages-tab" href="/login?redirectToUrl={{ url()->current() }}" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                                            <i class="bx bxs-location-plus"></i>
                                            My Country
                                            <i class="flaticon-right-arrow two"></i>
                                        </a>
                                   
                                        <a class="nav-link" id="v-pills-home-tab" href="/login?redirectToUrl={{ url()->current() }}" role="tab" aria-controls="v-pills-home" aria-selected="false">
                                            <i class="flaticon-placeholder"></i>
                                            My Location
                                            <i class="flaticon-right-arrow two"></i>
                                        </a>
                                        <a class="nav-link" id="v-pills-profile-tab" href="/login?redirectToUrl={{ url()->current() }}" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                            <i class="flaticon-resume"></i>
                                            My Industry
                                            <i class="flaticon-right-arrow two"></i>
                                        </a>                                      
                                    </div>

                                <!--     advertise here -->
                                    <a href="/advertise/create">
                                        <div class="card">
                                            <div class="card-header" style="background-color:#554695; color:white;">
                                                Advertise Here
                                            </div>              
                                        </div>
                                        <div class="d-flex justify-content-center banner shadow-lg animate__animated animate__swing animate__infinite infinite animate__slower 20s mt-4">
                                            <h5>Hire on Emploi</h5>
                                        </div>
                                    </a>
                                 <!--    end advertise here     -->                  
                                </div>
                                @endguest
                                <div class="{{ auth()->user() ? 'col-lg-12' : 'col-lg-10'}}">
                                    <div class="row justify-content-between">
                                        <div class="col-md-6">
                                            <div class="sorting-menu mt-3 float-left">
                                                <ul> 
                                                    <li class="filter" data-filter="all">All</li>
                                                    @if (auth()->user() || !empty(request()->parameters))
                                                        <li class="filter" data-filter=".recommended">Recommended</li>   
                                                    @else
                                                        <a href="#" class="mr-3" data-toggle="modal" data-target="#recommendedModal">
                                                            <li>
                                                            Recommended
                                                            </li>
                                                        </a>
                                                    @endif
                                                    <li class="filter" data-filter=".saved">Saved</li>
                                                    <li class="filter" data-filter=".internships">Internships</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-4">                                              
                                            <a href=""></a>
                                            <a class="text-center float-right cmn-btn mb-4" data-toggle="collapse" href="#advancedFilter" role="button" aria-expanded="false" aria-controls="advancedFilter">
                                                Select Advanced Filters
                                                <i class='bx bx-filter'></i>
                                            </a>    
                                        </div>
                                    </div> 
                                    @include('v2.components.jobseeker.advanced-filter')

                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                            <?php $adsCounter = 0; ?>
                                            <div id="container" class="row">                                         
                                                @forelse($posts as $post)
                                                    @include('v2.components.jobseeker.vacancy-card')                                                    
                                                    <?php $adsCounter++; ?>
                                                        @if($adsCounter % 9 == 0 || $adsCounter == 1  && $adsCounter != 1)
                                                        <center>                                              
                                                            @if($agent->isMobile())
                                                            @include('components.ads.mobile_400x350')
                                                            @else            
                                                            @include('components.ads.flat_728x90')
                                                            @endif
                                                        </center>               
                                                        @endif
                                                @empty
                                                <div class="col-md-6">                                          
                                                    <p>No job posts found</p>
                                                </div>
                                                @endforelse
                                                <!-- FEATURED VACANCIES -->
                                                <div class="container-fluid">
                                                    <div class="card mb-4 p-2">
                                                        <div class="col-12 col-lg-12">
                                                            <h4 class="text-center">Top Trending Vacancies</h4>
                                                            <div class="row">                                              
                                                                @foreach($posts as $post)
                                                                @if($post->featured == 'true')
                                                                    <div class="col-md-6 px-0">
                                                                        <ul>           
                                                                            <li class="featured_links"><a href="/vacancies/{{$post->slug}}/" class="orange">{{  $post->getTitle() }}</a><br>
                                                                            </li>
                                                                        </ul>
                                                                    </div>                              
                                                                @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @guest                                         
                                           
                                                <div class="text-center">
                                                    <div class="mix recommended">
                                                        <p>
                                                            <a href="/login" class="btn btn-orange">{{ __('auth.login') }}</a>
                                                            or  
                                                            <a href="/join" class="btn btn-orange-alt">Register</a>
                                                            To view better recommendations
                                                        </p>
                                                    </div>
                                                </div>
                                                @endguest
                                                @guest
                                                <div class="text-center">
                                                    <div class="mix saved">
                                                        <p>
                                                            <a href="/login" class="btn btn-orange">{{ __('auth.login') }}</a>
                                                            or  
                                                            <a href="/join" class="btn btn-orange-alt">Register</a>
                                                            To save jobs for later
                                                        </p>
                                                    </div>
                                                </div>
                                                @endguest
                                            </div>
                                            <div class="row justify-content-center">
                                            @if(isset($search))
                                            @else
                                            {{ $posts->links() }}
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Jobs -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Jobs -->

      <!-- Advert Modal -->
    <div class="modal fade" id="advertModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
              <h4 class="modal-title">Advertise here</h4>
              </div>
                <div class="modal-body">               
                      <form  method="post" action="/employers/publish"  enctype="multipart/form-data">
                          @csrf                              
                          <div class="form-group">
                              <label for="">Your Name<strong class="text-danger">*</strong></label>
                              <input type="text" name="name" required="" class="form-control" placeholder="" maxlength="50">
                          </div>
                          <div class="form-group">
                              <label for="">Phone Number<strong class="text-danger">*</strong></label>
                              <input type="text" name="phone_number" value="" class="form-control" placeholder="" maxlength="50">
                          </div>
                          <div class="form-group">
                              <label for="">Email Address<strong class="text-danger">*</strong></label>
                              <input type="email" name="email" required="" class="form-control" placeholder="" maxlength="50">
                          </div>
                          <div class="form-group">
                              <label for="">Job Title</label>
                              <input type="text" name="title" maxlength="100" class="form-control" placeholder="">
                          </div>
                          <div class="form-group">
                              <label for="description">Job Description</label>
                              <input type="text" name="" name="description" class="form-control">
                          </div>                  

                          <div class="text-center">                 
                                
                              <input type="submit" class="btn btn-success" value="Submit">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            
                          </div>                                               
                      </form>
                  </div>                         
            </div>                  
        </div>
    </div>
  <!-- Advert Modal End-->

<!--     news letter modal -->
    @include('v2.components.modals.news-letter')
<!--     End news letter modal -->

    <!-- Featured -->
    @include('v2.components.featured-employers')                
    <!-- End Featured Employers -->

@endsection

@section('modal') 
    @include('v2.components.modals.recommender-parameters')

    @include('v2.components.modals.self-assessment')

    @include('v2.components.modals.advertise')
   
@endsection



