<div class="top-search py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <h5>Popular Categories</h5>
                <ul>
                    @foreach(\App\Industry::top(10) as $f)
                    <li><a href="/vacancies/{{ $f->slug }}">{{ $f->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <h5>Popular Jobs</h5>
                <ul>
                    @foreach(\App\Post::recent() as $f)
                    <li><a href="/vacancies/{{ $f->slug }}">{{ $f->title }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <h5>Popular Locations</h5>
                <ul>
                    <li>
                        <a href="#">Nairobi</a>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <h5>Popular Companies</h5>
                <ul>
                    <li>
                        <a href="#">Job Sikaz</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
