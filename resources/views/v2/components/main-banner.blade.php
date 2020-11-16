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
                                <strong>
                                    <a href="v2/vacancies">Latest Job Vacancies</a>
                                </strong>
                            </li>
                            <li>
                                <strong>
                                    <a href="companies?hiring=true">Companies Hiring</a>
                                </strong>
                            </li>
                            <li>
                                <strong>
                                    <a href="/vacancies/kenya">Jobs In Kenya</a>
                                </strong>
                            </li>
                            <li>
                                <strong>
                                    <a href="/vacancies/part-time">Part-time Jobs</a>
                                </strong>
                            </li>
                            <li>
                                <strong>
                                    <a href="/vacancies/full-time">Full-time Jobs</a>
                                </strong>
                            </li>
                            <li>
                                <strong>
                                    <a href="/vacancies/government">Government Jobs</a>
                                </strong>
                            </li>
                            <li>
                                <strong>
                                    <a href="/job-seekers/cv-templates">Free Sample CVs</a>
                                </strong>
                            </li>
                            <li>
                                <strong>
                                    <a href="/blog">Career Tips</a>
                                </strong>
                            </li>
                            <li>
                                <strong>
                                    <a href="/vacancies/sales">Sales Jobs</a>
                                </strong>
                            </li>
                            <li>
                                <strong>
                                    <a href="/vacancies/ngo">NGO Jobs</a>
                                </strong>
                            </li>
                        </ul>
                    </div>
                    <div class="register-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-4 col-lg-4">
                                    <div class="register-item">
                                        <h3>
                                            <span class="odometer">{{ count(\App\Post::all()) }}</span> 
                                        </h3>
                                        <p>Jobs</p>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-lg-4">
                                    <div class="register-item">
                                        <h3>
                                            <span class="odometer" >{{ count(\App\Seeker::all()) }}</span> 
                                        </h3>
                                        <p>Candidates</p>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-lg-4">
                                    <div class="register-item">
                                        <h3>
                                            <span class="odometer">{{ count(\App\Company::all()) }}</span>
                                        </h3>
                                        <p>Companies</p>
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

