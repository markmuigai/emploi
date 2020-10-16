<?php
    $posts = \App\Post::where('featured','true')->where('status','active')->get();
?>
<!-- FEATURED JOBS -->

    @forelse ($posts as $p)
        <div class="company-item two">
            <div class="feature-top-right">
                <span>Featured</span>
            </div>
            <div class="top">
                <a href="/vacancies/{{ $p->slug }}">
                    <img src="{{ asset($p->imageUrl) }}" alt="{{ $p->title }}">
                </a>
                <h3>
                    <a href="/vacancies/{{ $p->slug }}" style="height: 70px">{{ $p->getTitle(true) }}</a>
                </h3>
                <br>
                <span>{{$p->positions}} Positions</span>
                <p>
                    <i class="flaticon-appointment"></i>
                    {{ $p->location->name }}
                </p>
            </div>
            <div class="bottom">
                @if(isset(Auth::user()->id))
                    <span>Salary</span>
                    <h4>
                        {{ $p->monthlySalary() }} {{ $p->monthly_salary == 0 ? '' : 'p.m.' }}
                    </h4>
                    <br>
                @else
                @endif
                <a href="employer-details.html">
                    <i class="flaticon-right-arrow"></i>
                </a>
            </div>
        </div>
    @empty
        <div class="text-center">
            <p>No featured jobs posted yet. Please check back later.</p>
        </div>
    @endforelse
<!-- END OF FEATURED JOBS -->
