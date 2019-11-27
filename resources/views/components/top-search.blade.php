<div class="top-search py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-3">
                <h5>Top Industries</h5>
                <ul>
                    @forelse(\App\Industry::top(10) as $f)
                    <li><a href="/vacancies/{{ $f->slug }}">{{ $f->name }}</a></li>
                    @empty
                    @endforelse
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <h5>Featured Jobs</h5>
                <ul>
                    @forelse(\App\Post::featured(10) as $f)
                    <li><a href="/vacancies/{{ $f->slug }}">{{ $f->title }}</a></li>
                    @empty
                    @endforelse
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <h5>Jobs by Category</h5>
                <ul>
                    <li>
                        <a href="/vacancies/featured">Featured</a>
                    </li>
                    @forelse(\App\VacancyType::all() as $v)
                    <li>
                        <a href="/vacancies/{{ $v->slug }}">{{ $v->name }}</a>
                    </li>
                    @empty
                    @endforelse
                    <li>
                        <a href="/vacancies">All Jobs</a>
                    </li>
                    
                </ul>
            </div>
            <div class="col-12 col-md-6 col-lg-3">
                <h5>Hiring Companies</h5>
                <ul>
                    @forelse(\App\Company::getHiringCompanies() as $v)
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