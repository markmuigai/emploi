<div class="top-search py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <h5>{{ __('jobs.top_industries') }}</h5>
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
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <?php
                    $posts = \App\Post::where('status','active')->where('featured','!=','false')->orderBy('id','DESC')->limit(6)->get();
                    // $featured = \App\Post::featured(10);
                    // $missing = 10 - count($featured);
                ?>
                <h5><a href="/vacancies/featured">{{ __('jobs.f_jobs') }} </a></h5>
                <ul>
                    @forelse($posts as $f)
                    <li><a href="/vacancies/{{ $f->slug }}">{{ $f->getTitle(true) }}</a></li>
                    @empty
                    @endforelse
                </ul>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <h5>{{ __('jobs.j_by_cat') }}</h5>
                <ul>
<!--                     <li>
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
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <h5> <a href="/blog">{{ __('other.blogs') }}</a></h5>
                <ul>
                    @forelse(\App\Blog::recent(4) as $v)
                    <li class="mb-1">
                        <a href="/blog/{{ $v->slug }}">{{ $v->title }}</a>
                    </li>
                    @empty
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
