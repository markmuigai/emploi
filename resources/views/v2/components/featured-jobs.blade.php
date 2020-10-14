<?php
    $posts = \App\Post::where('featured','true')->where('status','active')->take(6)->get();
?>
<!-- FEATURED JOBS -->

<div class="row">
    @foreach($posts as $p)
    <div class="col-sm-6 col-lg-2">
        <div class="feature-item">
            <a href="/vacancies/{{ $p->slug }}">
               <img src="{{ asset('images/500g.png') }}" data-src="{{ asset($p->imageUrl) }}" class="lazy"  alt="{{ $p->title }}" />
            </a>
            <div class="bottom">
                <h3>
                    <a href="/vacancies/{{ $p->slug }}">{{ $p->title }}</a>
                </h3>
                 <span>{{$p->positions}} Positions</span>
                <i class="flaticon-verify"></i>
            </div>
        </div>
    </div>
    @endforeach
</div>
<!-- END OF FEATURED JOBS -->
