  
    <?php
        $blogs = \App\Blog::where('status','active')->orderBy('created_at', 'desc')->take(6)->get();
    ?>
    <!-- Blogs -->

        <!-- Blog Details -->
        <div class="blog-details-area py-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="details-item">
                            <div class="details-tag">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="left">
                                            <ul>
                                                <li>
                                                    <span>Tags:</span>
                                                </li>
                                                @foreach (App\BlogCategory::all() as $cat)
                                                    <li>
                                                        <a href="blog-details.html#">#{{$cat->name}}</a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="details-date">
                                <div class="row">
                                    @foreach($blogs as $b)
                                        <div class="col-sm-6 col-lg-6">
                                            <div class="date-inner">
                                                <h4>
                                                    {{ $b->title }}
                                                </h4>
                                                <span class="mt-2">{{$b->postedOn}}</span>
                                                <a href="/blog/{{ $b->slug }}">
                                                    <i class='bx bx-right-arrow-alt'></i>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Blog Details -->
    