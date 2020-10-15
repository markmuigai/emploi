@extends('v2.layouts.app')

@section('content')
    <!-- Navbar -->
    @include('v2.components.jobseeker.navbar')
    <!-- End Navbar -->

    <!-- Jobs -->
    <div class="job-area-list ptb-100" style="margin-top: 35px">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="job-list-right">                        
                        @forelse($industries as $ind)
                        <li><a href="/vacancies/{{ $ind->slug }}">{{ $ind->name }}</a></li>
                        </ul>
                        @empty
                        @endforelse         
                    </div>  
                </div>

                <div class="col-lg-8">               
                    <form method="get" class="form-row" action="{{ url('/vacancies/search') }}"> 
                         <div class="col-lg-2 col-md-6 py-2">         
                            <div class="nav-item dropdown">
                                 <button class="btn btn-orange dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Countries
                                </button>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a href="/vacancies">All Countries</a><br>
                                    @forelse(\App\Country::active() as $c)
                                    <a href="/vacancies/{{ $c->name }}">Jobs in {{ $c->name }}</a><br>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-6 py-2">
                            <input type="text" name="q" class="form-control" placeholder="Search" value="{{ isset($search_query) ? $search_query : '' }}" maxlength="50">
                        </div>
                        <div class="col-lg-3 col-md-6 py-2">
                            <select class="selectpicker" data-live-search="true" name="location">
                                  <option value="">All Locations</option>
                                  @forelse($locations as $l)
                                  <option class="d-flex" value="{{ $l->id }}" {{ isset($search_location) && $search_location == $l->id ? 'selected=""' : '' }}>
                                      {{ $l->name.', '.$l->country->code }}
                                  </option>
                                  @empty
                                  @endforelse
                            </select>
                        </div>
                        <div class="col-lg-3 col-md-6 py-2">
                            <select class="selectpicker" data-live-search="true" name="industry">
                                <option value="">All Industries</option>
                                @forelse($industries as $ind)
                                <option value="{{ $ind->id }}" {{ isset($search_ind) && $search_ind == $ind->id ? 'selected=""' : '' }}>
                                    {{ $ind->name }}
                                </option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-6 py-2">
                            <select class="selectpicker" name="vacancyType" data-live-search="true">
                                <option value="">All Vacancy Types</option>
                                @forelse($vacancyTypes as $l)
                                <option value="{{ $l->id }}" {{ isset($search_vtype) && $search_vtype == $l->id ? 'selected=""' : '' }}>
                                    {{ $l->name }}
                                </option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="col-12 my-2 text-center">
                            <button type="submit" name="button" class="btn btn-sm btn-orange">Search</button>
                            @if(isset($search_vtype) || isset($search_ind) || isset($search_location) || isset($search_query))
                            <button type="reset" name="button" class="btn btn-sm btn-danger ml-3"><a href="/vacancies">Reset</a></button>
                            @endif
                            <hr>
                        </div>
                    </form> 
                    @forelse($posts as $post)
                    <div class="employer-item">
                        <a href="/vacancies/{{$post->slug}}/"> 
                        <img src="{{ asset('images/500g.png') }}" data-src="/storage/images/logos/{{ $post->image }}" alt="{{ $post->getTitle() }}" />
                        </a>
                            <h3>{{ $post->getTitle() }}</h3>
                            <ul>
                                <li>
                                    <i class="flaticon-send"></i>
                                    {{ $post->location->country->name }}, {{ $post->location->name }}
                                </li>
                                <li>{{ $post->since }}</li>
                            </ul>
                            <p>We are Looking for a skilled Ul/UX designer amet conscu adiing elitsed do eusmod tempor</p>
                            <span class="span-one"> {{ $post->industry->name }}</span>
                            <span class="span-two"> {{ $post->vacancyType->name }}</span>
                        </a>
                    </div>
                    @empty
                    <div class="card">
                    <div class="card-body text-center">
                        <p>No job posts found</p>
                    </div>
                    </div>
                    @endforelse
                   
                 
                    <div class="pagination-area">
                        <ul>
                        {{ $posts->links() }}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Jobs -->
@endsection