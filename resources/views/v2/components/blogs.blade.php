  
    <?php
        $blogs = \App\Blog::where('status','active')->take(3)->get();
    ?>
    <!-- Blogs -->

    <div class="row">
        @foreach($blogs as $b)
        <div class="col-sm-6 col-lg-4">
            <div class="blog-item">
                <div class="top">
                    <a href="blog-details.html">
                        <img src="/storage/blogs/{{ $b->image1 }}" alt="{{ $b->title }}">
                    </a>
                </div>
                <span>{{ $b->category->name }} </span>
                <div class="blog-content" style="height: 160px;">
                    <h3>
                        <a href="/blog/{{ $b->slug }}"> {{ $b->title }} </a>
                    </h3>
                    <p>{!!html_entity_decode($b->longPreview(100))!!}</p>
                </div>
                <div class="cmn-link d-flex align-self-end">
                    <a href="blog-details.html" class="align-self-end">
                        <i class="flaticon-right-arrow one"></i>
                        Learn More
                        <i class="flaticon-right-arrow two"></i>
                    </a>
                </div>
            </div>
        </div> 
        @endforeach          
    </div>
    <!-- End of Blogs -->
