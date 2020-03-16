<?php
if(isset($post))
    $otherJobs = $post->otherJobs(6);
else
    $otherJobs = [];
?>

@if(count($otherJobs) > 0)
<!-- OTHER JOBS -->
<div class="container mt-5 text-center">
    <h2 class="orange">Other Jobs</h2>
    
    <div class="otherjobs-carousel">
        @forelse($otherJobs as $o)
        <div class="card mx-4 m-md-2 m-lg-4" >
            <div class="card-body">
                <a href="/vacancies/{{ $o->slug }}">
                    <div class="d-flex justify-content-center mb-3">
                        <img src="{{ asset('images/500g.png') }}" data-src="{{ asset($o->imageUrl) }}" class="lazy"  alt="{{ $o->title }}" style="width: 100%" />
                    </div>
                </a>
                <p class="badge badge-secondary">{{ $o->positions }} Position{{ $o->positions == 1 ? '' : 's' }} </p>
                <a href="/vacancies/{{ $o->slug }}">
                    <h5>{{ $o->getTitle(true) }}</h5>
                </a>
                <p>
                    <a href="/vacancies/{{ $o->location->name }}" title="View Vacancies in {{ $o->location->name }}">
                        <i class="fas fa-map-marker-alt orange"></i> {{ $o->location->name }}
                    </a>
                </p>
                <p>
                    {{ $post->since }}
                </p>
                <p>
                    
                    <button class="btn btn-orange-alt" data-toggle="modal" data-target="#postModal{{ $o->id }}"><i class="fas fa-share-alt"></i> </button>
                    <a href="/vacancies/{{ $o->slug }}" class="btn btn-orange">View</a>
                </p>
            </div>
        </div>
        @include('components.post-share-modal')
        @empty
        @endforelse

        <div class="card mx-4 m-md-2 m-lg-4" >
            <div class="card-body">
                <div class="d-flex justify-content-center mb-3">
                    <img src="{{ asset('images/500g.png') }}" class="lazy"  alt="View More Vacancies" style="width: 100%" />
                </div>
                <p class="badge badge-secondary">{{ count($post->industry->activePosts()) }} Vacancies</p>
                <h5> Vacancies in {{ $post->industry->name }}</h5>
                <a href="/vacancies/{{ $post->industry->slug }}" class="btn btn-orange">View and Apply</a>
            </div>
        </div>

    </div>
    <script type="text/javascript">
        $().ready(function(){
            $('.otherjobs-carousel').slick({
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
<!-- END OF OTHER JOBS -->


@endif
