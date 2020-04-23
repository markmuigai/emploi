<!-- TESTIMONALS -->
<div class="container">
    <div class="testimonials generalTestimonials">
        <div class="card mx-4 mx-md-5 mx-lg-2 my-3">
            <div class="card-body">
                <h2 class="text-center orange">{{ __('other.testi') }}</h2>
                <div class="row align-items-center justify-content-center">
                    <div class="col-7 col-sm-5 col-md-2">
                        <img src="/images/avatar.png" data-src="{{asset('images/testimonials/paul.jpeg')}}" alt="Paul - Workpay" class="w-100 lazy">
                    </div>
                    <div class="col-12 col-md-10">
                        <p>“It took seven days from the time we signed up with Emploi looking to hire a key account manager to the time the candidate reported for work. We were very time constrained as we had already spent a lot of time trying to hire through other platforms with no success. From the other platforms I received a lot of irrelevant CVs that honestly I didn’t even know what to do with. I would rate Emploi higher than the other platforms, because I believe the human touch from their team was critical in fast tracking the process for us.”</p>
                        <hr class="short">
                        <h5>Paul</h5>
                        <p>Workpay</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mx-4 mx-md-5 mx-lg-2 my-3">
            <div class="card-body">
                <h2 class="text-center orange">{{ __('other.testi') }}</h2>
                <div class="row align-items-center justify-content-center">
                    <div class="col-7 col-sm-5 col-md-2">
                        <img src="/images/avatar.png" data-src="{{asset('images/avatar.png')}}" alt="Anthony Ochieng" class="w-100 lazy">
                    </div>
                    <div class="col-12 col-md-10">
                        <p>Emploi is the most efficient digital sourcing platform. They are fast and are good at what they do.</p>
                        <hr class="short">
                        <h5>Anthony Ochieng</h5>
                        <p>Employer</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mx-4 mx-md-5 mx-lg-2 my-3">
            <div class="card-body">
                <h2 class="text-center orange">{{ __('other.testi') }}</h2>
                <div class="row align-items-center justify-content-center">
                    <div class="col-7 col-sm-5 col-md-2">
                        <img src="/images/avatar.png" data-src="{{asset('images/testimonials/kizito.webp')}}" alt="Kipkemoi Kizito" class="w-100 lazy">
                    </div>
                    <div class="col-12 col-md-10">
                        <p>Emploi helped me define exactly what it is I was looking for and they even went further And gave me an opportunity of getting there.</p>
                        <hr class="short">
                        <h5>Kipkemoi Kizito</h5>
                        <p>Job Seeker</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mx-4 mx-md-5 mx-lg-2 my-3">
            <div class="card-body">
                <h2 class="text-center orange">{{ __('other.testi') }}</h2>
                <div class="row align-items-center justify-content-center">
                    <div class="col-7 col-sm-5 col-md-2">
                        <img src="/images/avatar.png" data-src="{{asset('images/testimonials/fay.webp')}}" alt="Faith Chepkemoi" class="w-100 lazy">
                    </div>
                    <div class="col-12 col-md-10">
                        <p>The Emploi Team creates a great rapport with their candidates and is an invaluable asset to anyone looking for a job.</p>
                        <hr class="short">
                        <h5>Faith Chepkemoi</h5>
                        <p>Job Seeker</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mx-4 mx-md-5 mx-lg-2 my-3">
            <div class="card-body">
                <h2 class="text-center orange">{{ __('other.testi') }}</h2>
                <div class="row align-items-center justify-content-center">
                    <div class="col-7 col-sm-5 col-md-2">
                        <img src="/images/avatar.png" data-src="{{asset('images/testimonials/sandra.webp')}}" alt="Sandra Eshitemi" class="w-100 lazy">
                    </div>
                    <div class="col-12 col-md-10">
                        <p>Working with Emploi was an enabling experience. They work with a schedule and to rubber stamp it all they are reputable.</p>
                        <hr class="short">
                        <h5>Sandra Eshitemi</h5>
                        <p>Employer</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $().ready(function(){
        $('.generalTestimonials').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: true,
            prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
            autoplay: true,
            speed: 2000,
        });
    });
</script>
<!-- END OF TESTIMONIALS -->