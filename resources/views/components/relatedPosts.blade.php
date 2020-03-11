<?php
if(isset($post))
    $relatedPosts = $post->related(5);
else
    $relatedPosts = [];
?>

@if(count($relatedPosts) > 0)
<!-- RELATED JOBS -->
<div class="container mt-5 text-center">
    <h2 class="orange">Related Jobs</h2>
    
    <div class="featured-carousel">
        @forelse($relatedPosts as $p)
        <a class="card mx-4 m-md-2 m-lg-4" href="/vacancies/{{ $p->slug }}">
            <div class="card-body">
                <div class="d-flex justify-content-center mb-3">
                    <img src="{{ asset('images/500g.png') }}" data-src="{{ asset($p->imageUrl) }}" class="lazy"  alt="{{ $p->title }}" />
                </div>
                <p class="badge badge-secondary">{{$p->positions}} Postions</p>
                <h5>{{ $p->getTitle(true) }}</h5>
                <p><i class="fas fa-map-marker-alt orange"></i> {{ $p->location->name }}</p>
                <p>
                    @if(isset(Auth::user()->id))
                    {{ $p->monthlySalary() }} {{ $p->monthly_salary == 0 ? '' : 'p.m.' }}
                    @else
                    @endif
                </p>
                <p>
                    
                        <i class="fab fa-facebook-f" style="margin: 0.25em"></i>

                        <i class="fab fa-twitter" style="margin: 0.25em"></i>

                        <i class="fab fa-linkedin" style="margin: 0.25em"></i>

                        <i class="fab fa-whatsapp" style="margin: 0.25em"></i>

                </p>
            </div>
        </a>
        @empty
        @endforelse
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

