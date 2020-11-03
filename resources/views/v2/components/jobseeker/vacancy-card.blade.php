<div class="col-sm-6 col-lg-4 mix {{$recommendedJobs->has($post->id) ? 'recommended' : ''}}">
    <div class="cat-item">
        <span id="vacancies-image">
            <a href="/vacancies/{{ $post->slug }}">
                <img src="{{ asset($post->imageUrl) }}" alt="{{ $post->title }}">
            </a>
        </span>
        <h3>
            <a href="/vacancies/{{$post->slug}}/">{{  $post->getTitle() }}</a>
        </h3>
        <div class="row">
            <div class="col-md-6">
                @if($post->featured == 'true')
                <span class="badge badge-pill badge-success mx-1">
                    <i class="bx bx-star"> </i>Featured
                </span>
                @endif
            </div>
            <div class="col-md-4">
                <i class='bx bx-heart'></i> Save
            </div>
        </div>
        <span>{{ $post->positions }} Position{{ $post->positions == 1 ? '' : 's' }} | 
            Posted {{ $post->since }}
        </span>
        <a class="link" href="index-2.html#">
            <i class="flaticon-right-arrow"></i>
        </a>
    </div>
</div>