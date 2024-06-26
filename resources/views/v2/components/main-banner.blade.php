<!-- Banner -->
<div class="banner-area three">
    <div class="container-fluid">
        <div class="banner-content two three">
            <div class="d-table">
                <div class="d-table-cell">
                    <h1>Blast Off <span>Your Career</span></h1>
                    <div class="banner-form-area">
                        <form method="get" action="/v2/vacancies/search" class="text-center">
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
                                        <input type="text" name="industry" placeholder="{{ isset(request()->industry) ? request()->industry : 'All Industries' }}" class="form-control" name="industry" list="industryList">
                                            <datalist id="industryList">
                                                @foreach (\App\Industry::active() as $i)                                             
                                                    <option>
                                                        {{ $i->name }}
                                                    </option>
                                                @endforeach
                                            </datalist>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="text" name="location" placeholder="{{ isset(request()->location) ? request()->location : 'All Locations' }}" class="form-control" name="location" list="locationList">
                                            <datalist id="locationList">
                                                @forelse ($locations as $loc)                                             
                                                    <option>
                                                        {{ $loc->name }}
                                                    </option>
                                                @empty
                                                @endforelse
                                            </datalist>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn">
                                Search Job
                                <i class='bx bx-search'></i>
                            </button>
                        </form>
                    </div>
                    <div class="my-2">
                        <a class="text-center cmn-btn mt-2" href="{{Route('v2.cv-review.create', ['reviewResults' => 72])}}">
                            Automatic CV Review
                            <i class='bx bx-book-content' ></i>
                        </a>
                        <a class="text-center cmn-btn mt-2" href="/v2/assessment/about">
                           Self Assessment
                            <i class='bx bx-stats'></i>
                        </a>
                    </div>
                    <div class="register-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-3 col-lg-3">
                                    <div class="register-item">
                                        <h3>
                                            <span class="odometer">{{ count(\App\Post::all())*2 }}</span> 
                                        </h3>
                                        <p>Jobs</p>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-lg-3">
                                    <div class="register-item">
                                        <h3>
                                            <span class="odometer" >{{ count(\App\Seeker::all())*2 }}</span> 
                                        </h3>
                                        <p>Candidates</p>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-lg-3">
                                    <div class="register-item">
                                        <h3>
                                            <span class="odometer">{{ count(\App\Company::all())*2 }}</span>
                                        </h3>
                                        <p>Companies</p>
                                    </div>
                                </div>
                                <div class="col-sm-3 col-lg-3">
                                    <div class="register-item">
                                        <h3>
                                            <span class="odometer">{{ count(\App\Country::where('status', 'active')->get()) }}</span>
                                        </h3>
                                        <p>Countries</p>
                                    </div>
                                </div>
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
    @include('v2.components.modals.self-assessment')
@endsection
