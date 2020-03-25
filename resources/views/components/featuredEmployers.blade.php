<!-- FEATURED EMPLOYERS -->
<div class="container py-5 text-center">
    <h2 class="orange">Featured Employers</h2>
    <div class="employers-carousel py-4" id="featured-employers-list">
        
        <span class="loadFeaturedEmployers btn btn-orange-alt"><i class="fa fa-spinner"></i> Loading ..</span>
        
        

        
    </div>
    <script type="text/javascript">
        $().ready(function(){
            $('.loadFeaturedEmployers').click(function(){
                $.ajax({
                    type: 'GET',
                    url: '/companies-featured',
                    success: function(response) {
                        $('.loadFeaturedEmployers').remove();
                        var company;
                        var $company;
                        var str;
                        for(var i=0; i<response.length; i++)
                        {
                            company = response[i];

                            str = company[1] != 1 ? 'Vacancies' : 'Vacancy';
                            $company = ''+
                            '<div class="d-flex justify-content-center my-2">'+
                                '<a href="/companies/'+company[0]+'" title="'+company[0]+' - '+company[1]+' '+ str +'">'+
                                    '<img alt="'+company[0]+'" class="lazy" src="'+company[2]+'" data-src="">'+
                                '</a>'+
                            '</div>';

                            $('#featured-employers-list').append($company);
                        }

                        $('.employers-carousel').slick({
                            infinite: true,
                            rows: 2,
                            slidesToShow: 3,
                            slidesToScroll: 2,
                            arrows: true,
                            prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
                            nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
                            autoplay: true,
                            speed: 500,
                            responsive: [{
                                    breakpoint: 996,
                                    settings: {
                                        slidesToShow: 3,
                                        slidesToScroll: 1,
                                    }
                                },
                                {
                                    breakpoint: 736,
                                    settings: {
                                        slidesToShow: 2,
                                        slidesToScroll: 1,
                                    }
                                },
                                {
                                    breakpoint: 425,
                                    settings: {
                                        slidesToShow: 1,
                                        slidesToScroll: 1,
                                    }
                                },
                            ]
                        });
                    },
                    error: function(e) {
                        setTimeout(function(){
                            $('.loadFeaturedEmployers').first().click();
                        },5000);
                        //notify('An error occurred loading hiring companies', 'error');
                    },
                });
            });
            $('.loadFeaturedEmployers').first().click();
        })
    </script>
    <a href="/companies" class="btn btn-orange">See Who Is Hiring</a>
</div>
<!-- END OF FEATURED EMPLOYERS -->