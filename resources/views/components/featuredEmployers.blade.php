<?php
    $posts = \App\Post::all();
?>
<!-- FEATURED EMPLOYERS -->
<div class="container mt-5 text-center">
    <h2 class="orange">Featured Employers</h2>
    @if(count($posts) == 0)
    <div class="text-center">
        <p>No featured Employer yet. Please check back later.</p>
    </div>
    @else
    <div class="featured-carousel">
        @forelse($posts as $p)
        <a class="card mx-4 m-md-2 m-lg-4" href="/companies/{{ $p->company->name }}">
            <div class="card-body">
                <div class="d-flex justify-content-center mb-3">
                    <img src="{{ asset($p->company->logoUrl) }}" alt="{{ $p->company->name }}" class="circle-img"/>
                </div>
                <h5>{{ $p->company->name }}</h5>
            </div>
        </a>
        @empty
        @endforelse
    </div>
    <a href="/companies" class="btn btn-orange">See Who Is Hiring</a><br>
    @endif
    <script type="text/javascript">
        $().ready(function(){
            $('.featured-carousel').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 2,
                autoplay: true,
                speed: 1000,
                arrows: true,
                prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
                responsive: [{
                        breakpoint: 996,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 2,
                            autoplay: true,
                            speed: 1000,
                        }
                    },
                    {
                        breakpoint: 737,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                            autoplay: true,
                            speed: 1000,
                        }
                    },
                    {
                        breakpoint: 500,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            autoplay: true,
                            speed: 1000,
                        }
                    },
                ]
            });
        });
    </script>
</div>
<!-- END OF FEATURED EMPLOYERS -->