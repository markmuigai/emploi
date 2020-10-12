<footer class="footer-area three pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-lg-4">
                <div class="footer-item three">
                    <div class="footer-logo">
                        <a class="logo" href="index.html">
                            <img src="{{ asset('images/logo-alt.png') }}" alt="Emploi Logo" height="45px"/>
                        </a>
                        <ul>
                            <li>
                                <span>Address: </span>
                                <a href="https://www.google.com/maps/place/Emploi/@-1.3276001,36.8930386,18z/data=!4m6!3m5!1s0x182f0d6ec6d30da5:0x72bc053be0875fba!4b1!8m2!3d-1.3283885!4d36.894192" target="_blank">
                                    <p>Even Business Park, Airport North Rd, Nairobi </p>
                                </a>
                            </li>
                            <li>
                                <span>Message: </span> <br>
                                <a href="mailto:info@emploi.co">info@emploi.co</a>
                            </li>
                            <li>
                                <span>Phone: </span> <br>
                                <a href="tel:+254702068282">0702 068 282</a>
                                <br>
                                <a href="tel:+254774569001">0774 569 001</a>
                                <br>
                                <a href="tel:+254772795017">0772 795 017</a>
                            </li>
                            <li>
                                <span>Open: </span> <br>
                                Mon - Fri / 8:00 AM - 6:00 PM
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="footer-item three">
                    <div class="footer-service">
                        <h3>Top Industries</h3>
                        <ul>
                            <li><a href="/vacancies/sales">Sales Jobs</a></li>
                            <li><a href="/vacancies/it-and-telecoms">IT & Telecoms</a></li>
                            <li><a href="/vacancies/hr">Human Resource</a></li>
                            <li><a href="/vacancies/admin">Office and Admin Jobs</a></li>
                            <li><a href="/vacancies/accounting">Accounting Jobs</a></li>
                            <li><a href="/vacancies/government">Government Jobs</a></li>
                            <li><a href="/vacancies/graduate-jobs">Graduate Jobs</a></li>
                            <li><a href="/vacancies/healthcare">Healthcare & Pharmaceutical</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2">
                <div class="footer-item three">
                    <div class="footer-service">
                        <h3>{{ __('jobs.j_by_cat') }}</h3>
                        <ul>
                            <!--<li>
                                <a href="/vacancies/featured">{{ __('jobs.f_jobs') }}</a>
                            </li> -->
                            <li>
                                <a href="/vacancies/full-time">Full-time Jobs</a>
                            </li>
                            <li>
                                <a href="/vacancies/part-time">Part-time Jobs</a>
                            </li>
                            <li>
                                <a href="/vacancies/internships">Internships</a>
                            </li>
                            <li>
                                <a href="/vacancies/contract">Contract</a>
                            </li>
                            <li>
                                <a href="/vacancies/volunteer">Volunteer Positions</a>
                            </li>
                              <?php
                            $countries = \App\Country::where('id',1)->orwhere('id',2)->orwhere('id',3)->orwhere('id',4)->get();
                            // $featured = \App\Post::featured(10);
                            // $missing = 10 - count($featured);
                            ?>
                            @forelse($countries as $c)
                            <li>
                                <a href="/vacancies/{{ $c->name }}">Jobs in {{ $c->name }}</a>
                            </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="footer-item three">
                    <div class="footer-service">
                        <h3>{{ __('other.menu') }}</h3>
                        <ul>
                            <li><a href="/about">About Us</a></li>
                            <li><a href="/contact">Contact Us</a></li>
                            <li><a href="/terms-and-conditions">Terms and Conditions</a></li>
                            <li><a href="/privacy-policy">Privacy Policy</a></li>
                            <li><br><br>
                                <div class="lang_list">
                                    <form method="post" action="/language" id="localization-form" style="display: inline;"> 
                                    @csrf
                                    <select tabindex="4"  name="language" class="dropdown1" onchange="$('#localization-form').submit()"> 
                                        @foreach (Config::get('languages') as $lang => $language)
                                            <option value="{{ $lang }}" {{ $lang == App::getLocale() ? 'selected=""' : '' }}>{{$language}}</option>
                                        @endforeach
                                    </select>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>