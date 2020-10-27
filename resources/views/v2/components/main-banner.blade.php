<!-- Banner -->
<div class="banner-area three">
    <div class="container-fluid">
        <div class="banner-content two three">
            <div class="d-table">
                <div class="d-table-cell">
                    <h1>Blast Off <span>Your Career</span></h1>
                    <div class="banner-form-area">
                        <form method="get" action="/vacancies/search" class="text-center">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>
                                            <i class='bx bx-search'></i>
                                        </label>
                                            <input type="text" name="q" class="form-control" placeholder="Search Your Job" value="" onfocus="" onblur="">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                            <select name="industry" class="main-banner select">
                                            <option value="-1">All Industries</option>
                                            @foreach(\App\Industry::active() as $i)
                                            <option value="{{ $i->id }}">{{ $i->name }}
                                            </option>
                                            @endforeach
                                        </select>	
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <select name="location">
                                            <option value="-1">All Locations</option>
                                            @foreach(\App\Location::active() as $l)
                                            <option value="{{ $l->id }}">{{ $l->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn">
                                Search Job
                                <i class='bx bx-search'></i>
                            </button>
                        </form>
                    </div>
                    <div class="banner-key">
                        <ul>
                            <li>
                                <span>Trending Keywords:</span>
                            </li>
                            <li>
                                <a href="/vacancies/sales">Sales Jobs</a>
                            </li>
                            <li>
                                <a href="/vacancies/it-and-telecoms">IT & Telecoms</a>
                            </li>
                            <li>
                                <a href="/vacancies/hr">Human Resource</a>
                            </li>
                            <li>
                                <a href="/vacancies/admin">Office and Admin Jobs</a>
                            </li>
                            <li>
                                <a href="/vacancies/accounting">Accounting Jobs</a>
                            </li>
                            <li>
                                <a href="/vacancies/government">Government Jobs</a>
                            </li>
                            <li>
                                <a href="/vacancies/graduate-jobs">Graduate Jobs</a>
                            </li>
                            <li>
                                <a href="/vacancies/healthcare">Healthcare & Pharmaceutical</a>
                            </li>
                    
                        </ul>
                    </div>
                    <div class="my-2">
                        <a class="text-center cmn-btn mt-2" href="{{Route('v2.cv-review.create', ['reviewResults' => 72])}}">
                            CV Review
                            <i class='bx bx-book-content' ></i>
                        </a>
                        @auth
                            <a class="text-center cmn-btn mt-2 mx-3" href="{{route('v2.self-assessment.create')}}">
                                Self Assessment
                                <i class='bx bx-stats'></i>
                            </a>
                        @endauth
                        @guest
                            <a class="text-center cmn-btn mt-2 mx-3" type="button" data-toggle="modal" data-target="#selfAssessmentModal">
                                Self Assessment
                                <i class='bx bx-stats'></i>
                            </a>
                        @endguest
                    </div>
                    <div class="register-area">
                        <div class="container">
                            <div class="row">
                                @include('v2.components.stats')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Banner -->

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