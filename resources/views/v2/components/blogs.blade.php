  
    <?php
        $blogs = \App\Blog::where('status','active')->take(3)->get();
    ?>
    <!-- FEATURED JOBS -->
       <div class="row">
        @foreach($blogs as $b)
            <div class="col-sm-6 col-lg-4">
                <div class="blog-item">
                    <div class="top">
                        <a href="/blog/{{ $b->slug }}">
                            <img src="/storage/blogs/{{ $b->image1 }}" alt="{{ $b->title }}">
                        </a>
                    </div>
                    <span>{{ $b->category->name }}</span>
                    <h3>
                        <a href="/blog/{{ $b->slug }}"> {{ $b->title }} </a>
                    </h3>
                    <p class="truncate">{!!html_entity_decode($b->Preview)!!}</p>                           
                    <div class="cmn-link">
                        <a href="/blog/{{ $b->slug }}">
                            <i class="flaticon-right-arrow one"></i>
                      <a href="{{ url('blog/'.$b->slug) }}" class="orange">Read More</a>
                            <i class="flaticon-right-arrow two"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

