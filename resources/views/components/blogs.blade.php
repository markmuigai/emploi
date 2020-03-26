<!-- BLOGS -->


<div class="blogs mt-3" style=" padding: 0 0 1em 0; {{ isset($blogsTransparent) ? 'background: linear-gradient(140deg, #ffffff 0, #ffffff 60%)' : ''  }}">
    <div style="text-align: center; color: white; padding: 0.5em; margin: 0">
        <h2 style="padding: 0; margin: 0">Blog & News</h2>
    </div>
    <div class="container" style="">
        <div class="blogs-slider" style="color: black; ">

        </div>
    </div>
</div>

<script type="text/javascript">
    $().ready(function(){
        function loadBlogs(){

            $.ajax({
                type: 'GET',
                url: '/api/latest-blogs?csrf-token='+$('#csrf_token').attr('content'),
                success: function(response) {

                    var blog, $blog;
                    var $blogs = '';
                    
                    if(response.length == 0)
                    {
                        $('.blogs-slider').append('<div style="text-align: center;" class="col-md-12">No blogs found<br><br></div>');
                    }
                    else
                    {
                        for(var k=0; k<response.length; k++)
                        {
                            blog = response[k];
                            $blogs += ''+
                            '<div class="card mx-4 mx-md-5 mx-lg-2 my-3" style="background: white; overflow: hidden; padding: 1em; ">'+
                                '<div class="row">'+
                                    '<div class="col-md-3" style="overflow: hidden; float: left;">'+
                                        '<img src="'+blog['imageUrl']+'"   alt="'+blog['title']+'" style="width: 100%; border-radius: 5%" />'+
                                    '</div>'+
                                    '<div class="col-md-9" style=" float: left;">'+
                                        '<a href="/blog/'+blog['slug']+'" class="">'+
                                            '<h4 class="orange" style="">'+blog['title']+'</h4>'+
                                        '</a>'+
                                        '<div class="d-flex" style="">'+
                                            '<p style=" width: 100%">'+
                                                '<i class="fas fa-user"></i> '+ blog['user_name'] +' | <i class="fas fa-calendar-check"></i> '+ blog['created_at'] +' | '+ blog['likes'] +
                                            '</p>'+
                                        '</div>'+
                                        '<p class="badge badge-secondary">'+ blog['category'] +'</p>'+
                                        '<p>'+
                                            blog['longPreview'] +
                                        '</p>'+
                                       
                                        '<p>'+
                                            '<a href="/blog/'+blog['slug']+'" class="orange">Read More</a>'+
                                            '<button class="btn btn-orange-alt" data-toggle="modal" data-target="#socialModal'+blog["id"]+'" style="float: right;"><i class="fas fa-share-alt"></i> Share</button>'+
                                            
                                        '</p>'+
                                        
                                    '</div>'+

                                '</div>'+
                                
                                
                            '</div>';
                            

                            
                        }

                        $('.blogs-slider').append($blogs);

                        $('.blogs-slider').slick({
                            infinite: true,
                            slidesToShow: 1,
                            slidesToScroll: 1,
                            autoplay: true,
                            speed: 1000,
                            arrows: true,
                            prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
                            nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
                        });
                    }
                },
                error: function(e) {
                    setTimeout(loadBlogs,15000);
                    //loadBlogs();
                    
                },
            });
        }
        loadBlogs();
    });
</script>




<!-- END OF BLOGS -->