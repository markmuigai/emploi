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
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Banner -->

