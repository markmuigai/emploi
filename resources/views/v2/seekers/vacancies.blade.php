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
                        <div class="job">
                            <h3>Find A Job</h3>
                            <form>
                                <label>
                                    <i class="flaticon-send"></i>
                                </label>
                                <input type="email" class="form-control" placeholder="Email address">
                                <button type="submit" class="btn">Get A Job Alert</button>
                            </form>
                        </div>
                        <div class="job-list-all">
                            <div class="search">
                                <h3>Search Keywords</h3>
                                <form>
                                    <input type="text" class="form-control" placeholder="Keyword">
                                    <button type="submit" class="btn">
                                        <i class="flaticon-send"></i>
                                    </button>
                                </form>
                                <h3>Category</h3>
                                <form>
                                    <ul class="job-cmn-cat">
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Digital & Creative (5)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                                                <label class="form-check-label" for="defaultCheck2">
                                                    Sales & Marketing (6)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck3">
                                                <label class="form-check-label" for="defaultCheck3">
                                                    Marketing & PR (8)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck4">
                                                <label class="form-check-label" for="defaultCheck4">
                                                    IT Contractor (2)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck5">
                                                <label class="form-check-label" for="defaultCheck5">
                                                    Accountancy (1)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck6">
                                                <label class="form-check-label" for="defaultCheck6">
                                                    Retail (9)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck7">
                                                <label class="form-check-label" for="defaultCheck7">
                                                    Media (3)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck8">
                                                <label class="form-check-label" for="defaultCheck8">
                                                    SEO (2)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck9">
                                                <label class="form-check-label" for="defaultCheck9">
                                                    Freelance (8)
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                            <div class="location-list cmn-padding">
                                <h3>Location List</h3>
                                <form>
                                    <ul class="job-cmn-cat">
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck10">
                                                <label class="form-check-label" for="defaultCheck10">
                                                    New York (8)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck11">
                                                <label class="form-check-label" for="defaultCheck11">
                                                    Los Angeles (4)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck12">
                                                <label class="form-check-label" for="defaultCheck12">
                                                    London (5)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck13">
                                                <label class="form-check-label" for="defaultCheck13">
                                                    Canada (1)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck14">
                                                <label class="form-check-label" for="defaultCheck14">
                                                    France (9)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck15">
                                                <label class="form-check-label" for="defaultCheck15">
                                                    Italy (2)
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                            <div class="job-type cmn-padding">
                                <h3>Job Type</h3>
                                <form>
                                    <ul class="job-cmn-cat">
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck16">
                                                <label class="form-check-label" for="defaultCheck16">
                                                    Temporary (2)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck17">
                                                <label class="form-check-label" for="defaultCheck17">
                                                    Remote (2)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck18">
                                                <label class="form-check-label" for="defaultCheck18">
                                                    Part Time (2)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck19">
                                                <label class="form-check-label" for="defaultCheck19">
                                                    Internship (1)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck20">
                                                <label class="form-check-label" for="defaultCheck20">
                                                    Full Time (13)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck21">
                                                <label class="form-check-label" for="defaultCheck21">
                                                    Freelancer (3)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck22">
                                                <label class="form-check-label" for="defaultCheck22">
                                                    Contract (0)
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                            <div class="salary cmn-padding">
                                <h3>Salary</h3>
                                <form>
                                    <div class="job-cmn-cat flex-divide">
                                        <ul class="left">
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck23">
                                                    <label class="form-check-label" for="defaultCheck23">
                                                        Monthly
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck24">
                                                    <label class="form-check-label" for="defaultCheck24">
                                                        Daily
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck25">
                                                    <label class="form-check-label" for="defaultCheck25">
                                                        Yearly
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="right">
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck26">
                                                    <label class="form-check-label" for="defaultCheck26">
                                                        Weekly
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck27">
                                                    <label class="form-check-label" for="defaultCheck27">
                                                        Hourly
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="form-group">
                                        <label class="range" for="formControlRangeTwo">$6778 - $9077</label>
                                        <input type="range" class="form-control-range" id="formControlRangeTwo">
                                    </div>
                                </form>
                            </div>
                            <div class="date cmn-padding">
                                <h3>Date Posted</h3>
                                <form>
                                    <div class="job-cmn-cat flex-divide">
                                        <ul class="left">
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck28">
                                                    <label class="form-check-label" for="defaultCheck28">
                                                        Last 30 Days
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck29">
                                                    <label class="form-check-label" for="defaultCheck29">
                                                        Last 14 Days
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck30">
                                                    <label class="form-check-label" for="defaultCheck30">
                                                        Last 7 Days
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck31">
                                                    <label class="form-check-label" for="defaultCheck31">
                                                        All
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="right">
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck32">
                                                    <label class="form-check-label" for="defaultCheck32">
                                                        Last 24 Hours
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck33">
                                                    <label class="form-check-label" for="defaultCheck33">
                                                        Last 14 Days
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck34">
                                                    <label class="form-check-label" for="defaultCheck34">
                                                        Last Hour
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </form>
                            </div>
                            <div class="employer cmn-padding">
                                <h3>Employer</h3>
                                <form>
                                    <ul class="job-cmn-cat">
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck35">
                                                <label class="form-check-label" for="defaultCheck35">
                                                    Microsoft (1)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck36">
                                                <label class="form-check-label" for="defaultCheck36">
                                                    3S Software (3)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck37">
                                                <label class="form-check-label" for="defaultCheck37">
                                                    Telegram (6)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck38">
                                                <label class="form-check-label" for="defaultCheck38">
                                                    Al Jazeera (2)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck39">
                                                <label class="form-check-label" for="defaultCheck39">
                                                    Computer Factor (13)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck40">
                                                <label class="form-check-label" for="defaultCheck40">
                                                    It Training 4U (7)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck41">
                                                <label class="form-check-label" for="defaultCheck41">
                                                    Skype (1)
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                </form>
                            </div>
                            <div class="industry cmn-padding">
                                <h3>Industry</h3>
                                <form>
                                    <div class="job-cmn-cat flex-divide">
                                        <ul class="left">
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck42">
                                                    <label class="form-check-label" for="defaultCheck42">
                                                        Banking (4)
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck43">
                                                    <label class="form-check-label" for="defaultCheck43">
                                                        HTML & CSS (1)
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck44">
                                                    <label class="form-check-label" for="defaultCheck44">
                                                        Finance (1)
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="right">
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck45">
                                                    <label class="form-check-label" for="defaultCheck45">
                                                        SEO (7)
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck46">
                                                    <label class="form-check-label" for="defaultCheck46">
                                                        Development (4)
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck47">
                                                    <label class="form-check-label" for="defaultCheck47">
                                                        Last Hour
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </form>
                            </div>
                            <div class="experience cmn-padding">
                                <h3>Experience</h3>
                                <form>
                                    <div class="job-cmn-cat flex-divide">
                                        <ul class="left">
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck48">
                                                    <label class="form-check-label" for="defaultCheck48">
                                                        5 Years (4)
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck49">
                                                    <label class="form-check-label" for="defaultCheck49">
                                                        4 Years (6)
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck50">
                                                    <label class="form-check-label" for="defaultCheck50">
                                                        3 Years (9)
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                        <ul class="right">
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck51">
                                                    <label class="form-check-label" for="defaultCheck51">
                                                        2 Years (8)
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck52">
                                                    <label class="form-check-label" for="defaultCheck52">
                                                        1 Year (2)
                                                    </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck53">
                                                    <label class="form-check-label" for="defaultCheck53">
                                                        Fresh (10)
                                                    </label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </form>
                            </div>
                            <div class="level">
                                <h3>Level</h3>
                                <form>
                                    <ul class="job-cmn-cat">
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck54">
                                                <label class="form-check-label" for="defaultCheck54">
                                                    Executive (2)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck55">
                                                <label class="form-check-label" for="defaultCheck55">
                                                    Student (2)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck56">
                                                <label class="form-check-label" for="defaultCheck56">
                                                    Telegram (6)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck57">
                                                <label class="form-check-label" for="defaultCheck57">
                                                    Officer (1)
                                                </label>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck58">
                                                <label class="form-check-label" for="defaultCheck58">
                                                    Others (1)
                                                </label>
                                            </div>
                                        </li>
                                    </ul>
                                    <button type="submit" class="btn">Filter Now</button>
                                </form>
                            </div>
                        </div>
                    </div>  
                </div>

                <div class="col-lg-8">
                    <ul class="job-list-item align-items-center">
                        <li>
                            <a href="jobs.html#">Results Found <span>(17)</span></a>
                            <a class="rss" href="jobs.html#">
                                <i class='bx bx-rss'></i>RSS Feed
                            </a>
                        </li>
                        <li>
                            <span class="sort">Sort By:</span>
                            <form>
                                <div class="form-group">
                                    <select>
                                        <option>Title</option>
                                        <option>Another option</option>
                                        <option>A option</option>
                                        <option>Potato</option>
                                    </select>
                                </div>
                            </form> 
                        </li>
                    </ul>
                    @forelse($posts as $post)
                    <div class="employer-item">
                        <a href="/vacancies/{{$post->slug}}/">  
                     <!--    <img src="{{ asset('images/500g.png') }}" data-src="{{ asset($post->imageUrl) }}" class="w-100 lazy" alt="{{ $post->getTitle() }}" /> -->
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