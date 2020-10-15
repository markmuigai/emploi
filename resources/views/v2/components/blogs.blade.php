  
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
                            <img src="{{ $b->image1 }}" alt="Blog">
                        </a>
                    </div>
                    <span>{{ $b->category->name }}</span>
                    <h3>
                        <a href="/blog/{{ $b->slug }}" class="truncate">{!!html_entity_decode($b->title)!!} </a>
                    </h3>
                    <div class="cmn-link">
                        <a href="/blog/{{ $b->slug }}">
                            <i class="flaticon-right-arrow one"></i>
                            Read More
                            <i class="flaticon-right-arrow two"></i>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

