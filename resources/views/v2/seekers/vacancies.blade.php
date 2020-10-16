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
                    @auth
                        <div class="profile-item">
                            <img src="{{asset('assets-v2/img/dashboard1.jpg')}}" alt="Dashboard">
                            <h2>Tom Henry</h2>
                            <span>Web Developer</span>
                        </div>
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="dashboard.html#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                <i class='bx bx-user'></i>
                                My Profile
                            </a>
                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="dashboard.html#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                                <div class="profile-list">
                                    <i class='bx bxs-inbox'></i>
                                    Applied Jobs
                                </div>
                            </a>
                            <a href="single-resume.html">
                                <div class="profile-list">
                                    <i class='bx bx-note'></i>
                                    My Resume
                                </div>
                            </a>
                            <a  href="login.html">
                                <div class="profile-list">
                                    <i class='bx bx-log-out'></i>
                                    Logout
                                </div>
                            </a>
                        </div>
                    @endauth
                    @guest
                    <div class="job-list-right">
                        <div class="job-list-all">
                            <div class="search">
                                <h3>Filter By Category</h3>
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
                                <h3><a data-toggle="collapse" href="#location-filter" role="button" aria-expanded="false" aria-controls="location-filter">
                                    Filter By Location
                                  </a></h3>
                                <div class="collapse" id="location-filter">
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
                    @endguest
                </div>

                <div class="col-lg-9 jobs-form">               

        <!-- Filter -->
        <div class="job-filter-area pt-2">
            <div class="container">
                <form>
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="e.g UI/UX Design">
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <select>
                                    <option>Filter By Age</option>
                                    <option>Another option</option>
                                    <option>A option</option>
                                    <option>Potato</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <select>
                                    <option>Filter By Category</option>
                                    <option>Another option</option>
                                    <option>A option</option>
                                    <option>Potato</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <select>
                                    <option>Filter By Location</option>
                                    <option>Another option</option>
                                    <option>A option</option>
                                    <option>Potato</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <select>
                                    <option>Filter By Languages</option>
                                    <option>Another option</option>
                                    <option>A option</option>
                                    <option>Potato</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <select>
                                    <option>Filter By Qualifications</option>
                                    <option>Another option</option>
                                    <option>A option</option>
                                    <option>Potato</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="form-group">
                                <select>
                                    <option>Filter By Experiences</option>
                                    <option>Another option</option>
                                    <option>A option</option>
                                    <option>Potato</option>
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
                               <li class="filter" data-filter=".m">Internship</li>
                               <li class="filter" data-filter=".n">Full Time</li>
                               <li class="filter" data-filter=".o">Part Time</li>
                               <li class="filter" data-filter=".p">Remote</li>
                               <li class="filter" data-filter=".u">Freelancer</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="container" class="row">
                    <div class="col-sm-6 col-lg-12 mix n">
                        <div class="job-item">
                            <a href="job-details.html">
                                <div class="feature-top-right">
                                    <span>Featured</span>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-lg-8">
                                        <div class="job-left">
                                            <img src="{{asset('assets-v2/img/home-one/job1.png')}}" alt="Brand">
                                            <h3>Product Designer</h3>
                                            <p>Digital Radio</p>
                                            <ul>
                                                <li>$500 - $1,000 /</li>
                                                <li>month /</li>
                                                <li>
                                                    <i class="flaticon-appointment"></i>
                                                    8 months ago
                                                </li>
                                                <li>
                                                    <i class='bx bx-location-plus'></i>
                                                    Seoul, South Korea
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="job-right">
                                            <ul>
                                                <li>
                                                    <i class="flaticon-customer"></i>
                                                    Full Time
                                                </li>
                                                <li>
                                                    <i class="flaticon-mortarboard"></i>
                                                    Master
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
                    <div class="col-sm-6 col-lg-12 mix o">
                        <div class="job-item">
                            <a href="job-details.html">
                                <div class="feature-top-right">
                                    <span>Featured</span>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-lg-8">
                                        <div class="job-left">
                                            <img src="{{asset('assets-v2/img/home-one/job2.png')}}" alt="Brand">
                                            <h3>Construction Worker</h3>
                                            <p>Digital Vine</p>
                                            <ul>
                                                <li>$600 - $2,000 /</li>
                                                <li>month /</li>
                                                <li>
                                                    <i class="flaticon-appointment"></i>
                                                    6 months ago
                                                </li>
                                                <li>
                                                    <i class='bx bx-location-plus'></i>
                                                    Kabul, Afghanistan
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="job-right">
                                            <ul>
                                                <li>
                                                    <i class="flaticon-customer"></i>
                                                    Part Time
                                                </li>
                                                <li>
                                                    <i class="flaticon-mortarboard"></i>
                                                    Master
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
                    <div class="col-sm-6 col-lg-12 mix m">
                        <div class="job-item">
                            <a href="job-details.html">
                                <div class="feature-top-right">
                                    <span>Featured</span>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-lg-8">
                                        <div class="job-left">
                                            <img src="{{asset('assets-v2/img/home-one/job3.png')}}" alt="Brand">
                                            <h3>Sr. Shopify Developer</h3>
                                            <p>Codex Info</p>
                                            <ul>
                                                <li>$400 - $1,500 /</li>
                                                <li>month /</li>
                                                <li>
                                                    <i class="flaticon-appointment"></i>
                                                    1 months ago
                                                </li>
                                                <li>
                                                    <i class='bx bx-location-plus'></i>
                                                    Buenos Aires, Argentina
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="job-right">
                                            <ul>
                                                <li>
                                                    <i class="flaticon-customer"></i>
                                                    Internship
                                                </li>
                                                <li>
                                                    <i class="flaticon-mortarboard"></i>
                                                    Master
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
                    <div class="col-sm-6 col-lg-12 mix p">
                        <div class="job-item">
                            <a href="job-details.html">
                                <div class="feature-top-right">
                                    <span>Featured</span>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-lg-8">
                                        <div class="job-left">
                                            <img src="{{asset('assets-v2/img/home-one/job4.png')}}" alt="Brand">
                                            <h3>Tax Manager</h3>
                                            <p>Techno Vino</p>
                                            <ul>
                                                <li>$450 - $1,250 /</li>
                                                <li>month /</li>
                                                <li>
                                                    <i class="flaticon-appointment"></i>
                                                    4 months ago
                                                </li>
                                                <li>
                                                    <i class='bx bx-location-plus'></i>
                                                    Vienna, Australia
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="job-right">
                                            <ul>
                                                <li>
                                                    <i class="flaticon-customer"></i>
                                                    Remote
                                                </li>
                                                <li>
                                                    <i class="flaticon-mortarboard"></i>
                                                    Master
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
                    <div class="col-sm-6 col-lg-12 mix u">
                        <div class="job-item">
                            <a href="job-details.html">
                                <div class="feature-top-right">
                                    <span>Featured</span>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-lg-8">
                                        <div class="job-left">
                                            <img src="{{asset('assets-v2/img/home-one/job5.png')}}" alt="Brand">
                                            <h3>Senior Data Engineer</h3>
                                            <p>Jarmin Poin</p>
                                            <ul>
                                                <li>$700 - $1,500 /</li>
                                                <li>month /</li>
                                                <li>
                                                    <i class="flaticon-appointment"></i>
                                                    2 months ago
                                                </li>
                                                <li>
                                                    <i class='bx bx-location-plus'></i>
                                                    Tirana, Albania
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="job-right">
                                            <ul>
                                                <li>
                                                    <i class="flaticon-customer"></i>
                                                    Freelancer
                                                </li>
                                                <li>
                                                    <i class="flaticon-mortarboard"></i>
                                                    Master
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