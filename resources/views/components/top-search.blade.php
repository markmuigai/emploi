<div class="top-search py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <h5>Top Industries</h5>
                <ul>
                    @forelse(\App\Industry::top(10) as $f)
                    <li><a href="/vacancies/{{ $f->slug }}">{{ $f->name }}</a></li>
                    @empty
                    @endforelse
                </ul>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <?php
                    $posts = \App\Post::where('status','active')->orderBy('featured','DESC')->orderBy('id','DESC')->limit(10);
                    // $featured = \App\Post::featured(10);
                    // $missing = 10 - count($featured);
                ?>
                <h5>Featured Jobs</h5>
                <ul>
                    @forelse($posts as $f)
                    <li><a href="/vacancies/{{ $f->slug }}">{{ $f->title }}</a></li>
                    @empty
                    @endforelse
                </ul>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <h5>Jobs by Category</h5>
                <ul>
                    <li>
                        <a href="/vacancies/featured">Featured</a>
                    </li>
                    <li>
                        <a href="/vacancies/full-time">Full Time</a>
                    </li>
                    <li>
                        <a href="/vacancies/part-time">Part-time</a>
                    </li>
                    <li>
                        <a href="/vacancies/internships">Internships</a>
                    </li>
                    <li>
                        <a href="/vacancies/contract">Contract</a>
                    </li>
                    <li>
                        <a href="/vacancies/volunteer">Volunteer</a>
                    </li>
                    <li>
                        <a href="/vacancies/remote">Remote</a>
                    </li>
                    <li>
                        <a href="/vacancies">All Jobs</a>
                    </li>

                </ul>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <h5>Hiring Companies</h5>
                <ul>
                    @forelse(\App\Company::getHiringCompanies2() as $v)
                    <li>
                        <a href="/companies/{{ $v->name }}">{{ $v->name }}</a>
                    </li>
                    @empty
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
