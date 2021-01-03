<?php
if(isset($post))
    $relatedPosts = $post->related(6);
else
    $relatedPosts = [];
?>

@if(count($relatedPosts) > 0)
<!-- RELATED JOBS -->
<div class="container mt-5 text-center">
    <h2 class="orange">Related Jobs</h2>
    
    <div class="featured-carousel">
        @forelse($relatedPosts as $p)
        <div class="card mx-4 m-md-2 m-lg-4" >
            <div class="card-body">
                <a href="/vacancies/{{ $p->slug }}">
                    <div class="d-flex justify-content-center mb-3">
                        <img src="{{ asset('images/500g.png') }}" data-src="{{ asset($p->imageUrl) }}" class="lazy"  alt="{{ $p->title }}" />
                    </div>
                </a>
                <p class="badge badge-secondary">{{ $p->positions }} Position{{ $p->positions == 1 ? '' : 's' }}</p>
                <a href="/vacancies/{{ $p->slug }}">
                    <h5>{{ $p->getTitle(true) }}</h5>
                </a>
                <p>
                    <a href="/vacancies/{{ $p->location->name }}" title="View Vacancies in {{ $p->location->name }}">
                        <i class="fas fa-map-marker-alt orange"></i> {{ $p->location->name }}
                    </a>
                </p>
                <p>
                    {{ $post->since }}
                </p>
                <p>
                    
                    <button class="btn btn-orange-alt" data-toggle="modal" data-target="#postModal{{ $p->id }}"><i class="fas fa-share-alt"></i> </button>
                    <a href="/vacancies/{{ $p->slug }}" class="btn btn-orange">View</a>
                </p>
            </div>
        </div>
        @include('components.post-share-modal')
        @empty
        @endforelse

        <div class="card mx-4 m-md-2 m-lg-4" >
            <div class="card-body">
                <div class="d-flex justify-content-center mb-3">
                    <img src="{{ asset('images/500g.png') }}" class="lazy"  alt="View More Vacancies" />
                </div>
                <p class="badge badge-secondary">{{ count($post->industry->activePosts()) }} Vacancies</p>
                <h5> Vacancies in {{ $post->industry->name }}</h5>
                <a href="/vacancies/{{ $post->industry->slug }}" class="btn btn-orange">View and Apply</a>
            </div>
        </div>

    </div>
    <script type="text/javascript">
        $().ready(function(){
            $('.featured-carousel').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 2,
                arrows: true,
                prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
                responsive: [{
                        breakpoint: 996,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 2,
                        }
                    },
                    {
                        breakpoint: 737,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                        }
                    },
                    {
                        breakpoint: 500,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                        }
                    },
                ]
            });
        });
    </script>
</div>
<!-- END OF RELATED JOBS -->


@endif

