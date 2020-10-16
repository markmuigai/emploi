@extends('v2.layouts.app')

@section('content')
    <!-- Navbar -->
    @include('v2.components.jobseeker.navbar')
    <!-- End Navbar -->

    <!-- Jobs -->
    <div class="job-area-list dashboard-area ptb-100" style="margin-top: 35px">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('v2.components.sidebar.jobseeker')
                </div>

                <div class="{{auth()->user() ? 'col-lg-9' : 'col-lg-12' }} jobs-form">               
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

                    <!-- Showing -->
                    <div class="job-showing-area">
                        <div class="container">
                            <h4>Showing 1 - 8 of 11 results</h4>
                            <div class="showing">
                                <div class="row">
                                    <div class="col-sm-6 col-lg-6">
                                        <div class="left">
                                            <div class="form-group">
                                                <select>
                                                    <option>Newest</option>
                                                    <option>Another option</option>
                                                    <option>A option</option>
                                                    <option>Potato</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-lg-6">
                                        <div class="right">
                                            <ul>
                                                <li>
                                                    <a href="employers.html#">
                                                        <i class='bx bx-dots-horizontal'></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="employers.html#">
                                                        <i class='bx bx-menu'></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Showing -->

                    <!-- Jobs -->
                    <section class="job-area pb-100">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-12 py-5">
                                    <div class="sorting-menu">
                                        <ul> 
                                        <li class="filter" data-filter="all">All</li>
                                        <li class="filter" data-filter=".p">My Bookmarks</li>
                                        <li class="filter" data-filter=".u">Recommended</li>
                                        <li class="filter" data-filter=".m">Internship</li>
                                        <li class="filter" data-filter=".n">Full Time</li>
                                        <li class="filter" data-filter=".o">Part Time</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div id="container" class="row">
                                @forelse ($posts as $post)
                                    <div class="col-sm-6 col-lg-12 mix n">
                                        <div class="job-item">
                                            <a href="/vacancies/{{$post->slug}}/">
                                                <div class="feature-top-right">
                                                    @if($post->featured == 'true')
                                                        @if(now()->diffInDays($post->created_at) > 2)
                                                            <span>Featured</span>
                                                        @else
                                                            <span>New</span>
                                                        @endif
                                                    @endif
                                                </div>
                                                <div class="row align-items-center">
                                                    <div class="col-lg-7">
                                                        <div class="job-left">
                                                            <img src="{{ asset($post->imageUrl) }}" height="80px" alt="Brand">
                                                            <h3>{{ $post->getTitle() }}</h3>
                                                            <p>{{$post->company->name}}</p>
                                                            <ul>
                                                                @if(isset(Auth::user()->id))
                                                                    <li>
                                                                        {{ $post->monthlySalary() }} {{ $post->monthly_salary == 0 ? '' : 'p.m.' }}
                                                                    </li>
                                                                @else
                                                                    <a href="/login" class="orange">{{ __('auth.login') }}</a> to view salary
                                                                @endif
                                                                <br>
                                                                <li class="mt-2">
                                                                    <i class="flaticon-appointment"></i>
                                                                    Posted {{ $post->since }}
                                                                </li>
                                                                <br>
                                                                <li class="mt-2">
                                                                    <i class='bx bx-location-plus'></i>
                                                                    {{ $post->location->country->name }}, {{ $post->location->name }}
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5 d-flex justify-content-center">
                                                        <div class="job-right">
                                                            <ul>
                                                                <li>
                                                                    Current Openings: <strong>{{ $post->positions }} Position{{ $post->positions == 1 ? '' : 's' }}</strong>
                                                                </li>
                                                                <li>
                                                                    <i class="fa fa-briefcase"></i> {{ $post->industry->name }}
                                                                </li>
                                                                <li>
                                                                    <i class="flaticon-customer"></i>
                                                                    {{ $post->vacancyType->name }}
                                                                </li>
                                                                <li>
                                                                    <i class="flaticon-mortarboard"></i>
                                                                    {{ $post->educationLevel->name }}
                                                                </li>
                                                                <li>
                                                                    <span>Add to bookmarks</span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @empty
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <p>No job posts found</p>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                            <div class="job-browse">
                                <p>A tons of top tech jobs are waiting for you. <a href="jobs.html">Browse all jobs</a></p>
                            </div>
                        </div>
                    </section>
                    <!-- End Jobs -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Jobs -->
@endsection

@section('js')
    <script>
    </script>
@endsection