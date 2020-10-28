@extends('v2.layouts.app')

@section('title','Emploi :: '.$title)

@section('content')
    <!-- Navbar -->
    @include('v2.components.jobseeker.navbar')
    <!-- End Navbar -->

    <!-- Jobs -->
    <div class="job-area-list dashboard-area mt-1 ptb-100">
        <div class="container-fluid px-4">
            <div class="row">
                <div class="col-lg-3">
                    @include('v2.components.sidebar.jobseeker')
                </div>           

                    <div class="{{auth()->user() ? 'col-lg-9' : 'col-lg-12' }} jobs-form">                    
                      
                    <button class="btn btn-success"><a href="{{Route('v2.cv-review.create', ['reviewResults' => 72])}}"><span style="color: white"> CV Review</i></span></a></button>
                    @auth
                     <button class="btn btn-success"><a href="{{route('v2.self-assessment.create')}}"><span style="color: white">  Self Assessment</i></span></a></button>
                    @endauth
                    @guest
                    <button class="btn btn-success"><a href="#" data-toggle="modal" data-target="#selfAssessmentModal"><span style="color: white">  Self Assessment</i></span></a></button>
                        
                    @endguest
         
                    <h3 class="text-center my-4">Get all the latest jobs in one place and apply.</h3>
              
                        @section('modal')
                        <div class="modal fade" id="selfAssessmentModal" tabindex="-1" role="dialog" aria-labelledby="selfAssessmentModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <h4 class="text-center mt-4">
                                      Select your details
                                  </h4>
                                <div class="modal-body">
                                  <form method="POST" action="{{route('v2.self-assessment.filter')}}">
                                    @csrf
                                    <div class="job-filter-area pt-2">
                                        <div class="container">
                                            <form>
                                                <div class="row">
                                                    <div class="col-sm-12 col-lg-12">
                                                        @guest
                                                            <div class="form-group">
                                                                <input type="email" name="email" required=""  class="form-control" maxlength="50" placeholder="Enter your email address" >
                                                            </div>
                                                        @endguest
                                                    </div>
                                                    <div class="col-sm-12 col-lg-12">
                                                        <div class="form-group">
                                                            <select name="industry">
                                                                <option>Select Your Industry</option>
                                                                @foreach(\App\Industry::active() as $i)
                                                                    <option value="{{ $i->id }}">{{ $i->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-lg-12">
                                                        <div class="form-group">
                                                            <select name="experience">
                                                                <option>Your Experience Level</option>
                                                                <option value="0">No Experience Required</option>
                                                                <option value="6">6 month Experience</option>
                                                                <option value="12">1 year Experience</option>
                                                                <option value="24">2 years Experience</option>
                                                                <option value="36">3 years Experience</option>
                                                                <option value="48">4 years Experience</option>
                                                                <option value="60">5 years Experience</option>
                                                                <option value="72">6 years Experience</option>
                                                                <option value="84">7 years Experience</option>
                                                                <option value="96">8 years Experience</option>
                                                                <option value="108">9 years Experience</option>
                                                                <option value="120">10 years Experience</option>
                                                                <option value="132">11 years Experience</option>
                                                                <option value="144">12 years Experience</option>
                                                                <option value="156">13 years Experience</option>
                                                                <option value="168">14 years Experience</option>
                                                                <option value="180">15 years Experience</option>
                                                                <option value="192">16 years Experience</option>
                                                                <option value="204">17 years Experience</option>
                                                                <option value="216">18 years Experience</option>
                                                                <option value="228">19 years Experience</option>
                                                                <option value="240">20 years Experience</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-lg-12">
                                                        <button type="submit" class="btn cmn-btn">
                                                            Proceed to Assessment
                                                            <i class='bx bx-search-alt'></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endsection
                    <div class="container">     
 
                    </div>  
                    <div class="collapse" id="advancedFilter">
                        <!-- Filter -->
                        <div class="job-filter-area pt-2">
                            <div class="container">
                                <form>
                                    <div class="row">
                                        <div class="col-sm-6 col-lg-3">
                                            <div class="form-group">
                                                <input type="text" name="q" class="form-control" placeholder="Enter Keyword(s)" value="{{ isset($search_query) ? $search_query : '' }}" maxlength="50">
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-3">
                                            <div class="form-group">
                                                <select name="industries[]">
                                                    <option>All Industries</option>
                                                    @forelse($industries as $ind)
                                                    <option value="{{ $ind->id }}" {{ isset($search_ind) && $search_ind == $ind->id ? 'selected=""' : '' }}>
                                                        {{ $ind->name }}
                                                    </option>
                                                        @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-3">
                                            <div class="form-group">
                                                <select>
                                                    <option>All Locations</option>
                                                    @forelse($locations as $l)
                                                    <option value="{{ $l->id }}" {{ isset($search_location) && $search_location == $l->id ? 'selected=""' : '' }}>
                                                        {{ $l->name.', '.$l->country->code }}
                                                    </option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-3">
                                            <div class="form-group">
                                                <select>
                                                    <option value="">All Vacancy Types</option>
                                                    @forelse($vacancyTypes as $l)
                                                    <option value="{{ $l->id }}" {{ isset($search_vtype) && $search_vtype == $l->id ? 'selected=""' : '' }}>
                                                        {{ $l->name }}
                                                    </option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-3">
                                            <div class="form-group">
                                                <select>
                                                    <option>Positions Available</option>
                                                    @for($i=1; $i<=200;$i++ ) <option value="{{ $i }}">{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-3">
                                            <div class="form-group">
                                                <select>
                                                    <option>All Education Levels</option>
                                                    @forelse ($educationLevels as $el)
                                                        <option>{{$el->name}}</option>    
                                                    @empty
                                                    @endforelse
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-3">
                                            <div class="form-group">
                                                <select>
                                                    <option>Experience</option>
                                                    <option value="0">No Experience Required</option>
                                                    <option value="6">6 month Experience</option>
                                                    <option value="12">1 year Experience</option>
                                                    <option value="24">2 years Experience</option>
                                                    <option value="36">3 years Experience</option>
                                                    <option value="48">4 years Experience</option>
                                                    <option value="60">5 years Experience</option>
                                                    <option value="72">6 years Experience</option>
                                                    <option value="84">7 years Experience</option>
                                                    <option value="96">8 years Experience</option>
                                                    <option value="108">9 years Experience</option>
                                                    <option value="120">10 years Experience</option>
                                                    <option value="132">11 years Experience</option>
                                                    <option value="144">12 years Experience</option>
                                                    <option value="156">13 years Experience</option>
                                                    <option value="168">14 years Experience</option>
                                                    <option value="180">15 years Experience</option>
                                                    <option value="192">16 years Experience</option>
                                                    <option value="204">17 years Experience</option>
                                                    <option value="216">18 years Experience</option>
                                                    <option value="228">19 years Experience</option>
                                                    <option value="240">20 years Experience</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-lg-3">
                                            <button type="submit" class="btn cmn-btn">
                                                Search
                                                <i class='bx bx-search-alt'></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- End Filter -->
                    </div>

                    <!-- Jobs -->
                    <div class="categories-area pt-2 pb-70">
                        <div class="container-fluid">
                            <div class="row justify-content-end">
                                <div class="col-md-6">
                                    <div class="sorting-menu mt-3 float-left">
                                        <ul> 
                                            <li class="filter" data-filter="all">All</li>
                                            <li class="filter" data-filter=".o">Recommended</li>
                                            {{-- @if (auth()->user())
                                                <li class="filter" data-filter=".o">Recommended</li>
                                            @else
                                                <li class="filter" data-toggle="modal" data-target="#promptLogin">Recommended</li>
                                            @endif --}}
                                            <li class="filter" data-filter=".o">Internship</li>
                                            <li class="filter" data-filter=".o">Full Time</li>
                                            <li class="filter" data-filter=".o">Part Time</li>
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
                            <div class="row">
                                @guest
                                <div class="col-lg-2">
                                    <h4>Filter By</h4>
                                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="index-2.html#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                            <i class="flaticon-placeholder"></i>
                                            My Location
                                            <i class="flaticon-right-arrow two"></i>
                                        </a>
                                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="index-2.html#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                            <i class="flaticon-resume"></i>
                                            My Industry
                                            <i class="flaticon-right-arrow two"></i>
                                        </a>
                                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="index-2.html#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                                            <i class="flaticon-pencil"></i>
                                            Skills
                                            <i class="flaticon-right-arrow two"></i>
                                        </a>
                                    </div>
                                </div>
                                @endguest
                                <div class="col-lg-9">
                                    <!-- FEATURED VACANCIES -->
                                    <div class="card mb-4">
                                        <div class="card-body">
                                            <div class="col-12 col-lg-8">
                                                <h4>Top Trending Vacancies</h4>
                                                <ul>
                                                    @foreach($posts as $post)
                                                    @if($post->featured == 'true') 
                                                    <li><a href="/vacancies/{{$post->slug}}/" class="orange">{{  $post->getTitle() }}</a><br></li>                               
                                                    @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                            <div id="container" class="row">
                                                @foreach($posts as $post)
                                                <div class="col-sm-6 col-lg-4 mix o">
                                                    <div class="cat-item">
                                                        <h3>
                                                            <a href="/vacancies/{{$post->slug}}/">{{  $post->getTitle() }}</a>
                                                        </h3>
                                                        <span>{{ $post->positions }} Position{{ $post->positions == 1 ? '' : 's' }} | 
                                                            Posted {{ $post->since }}
                                                        </span>
                                                        <a class="link" href="index-2.html#">
                                                            <i class="flaticon-right-arrow"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            <div class="row justify-content-center">
                                                {{$posts->links()}}
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

        <!-- Featured -->

        @include('v2.components.featured-employers')                
  
        <!-- End Featured Employers -->
@endsection

@section('js')
    <script>
    </script>
@endsection

@section('modal')
<div class="modal fade" id="promptLogin" tabindex="-1" role="dialog" aria-labelledby="promptLoginLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="promptLoginLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection

