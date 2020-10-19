<div id="container" class="row">
    @forelse ($posts->chunk(4) as $chunk)
        @foreach($chunk as $post)
        <div class="col-sm-6 col-lg-12 mix n">
            <div class="job-item">
                <a href="/vacancies/{{$post->slug}}/">
                    <div class="feature-top-right">
                        @if($post->featured == 'true')
                            @if(now()->diffInDays($post->created_at) > 2)
                                <span>Featured</span>
                            @else
                                <span>New</span>
                            @endif
                        @endif
                    </div>
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <div class="job-left">
                                <img src="{{ asset($post->imageUrl) }}" height="80px" alt="Brand">
                                <div class="job-left-details">
                                    <h3>{{ $post->getTitle() }}</h3>
                                    <p>{{$post->company->name}}</p>
                                    <ul>
                                        @if(isset(Auth::user()->id))
                                            <li>
                                                {{ $post->monthlySalary() }} {{ $post->monthly_salary == 0 ? '' : 'p.m.' }}
                                            </li>
                                        @else
                                            <a href="/login" class="orange">{{ __('auth.login') }}</a> to view salary
                                        @endif
                                        <br>
                                        <li class="mt-2">
                                            <i class="flaticon-appointment"></i>
                                            Posted {{ $post->since }}
                                        </li>
                                        <br>
                                        <li class="mt-2">
                                            <i class='bx bx-location-plus'></i>
                                            {{ $post->location->country->name }}, {{ $post->location->name }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="job-right">
                                <ul>
                                    <li>
                                        Current Openings: <strong>{{ $post->positions }} Position{{ $post->positions == 1 ? '' : 's' }}</strong>
                                    </li>
                                    <li>
                                        <i class="fa fa-briefcase"></i> {{ $post->industry->name }}
                                    </li>
                                    <li>
                                        <i class="flaticon-customer"></i>
                                        {{ $post->vacancyType->name }}
                                    </li>
                                    <li>
                                        <i class="flaticon-mortarboard"></i>
                                        {{ $post->educationLevel->name }}
                                    </li>
                                    <li>
                                        <span>Add to bookmarks</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
        @include('v2.components.ads.careerjet')
    @empty
        <div class="card">
            <div class="card-body text-center">
                <p>No job posts found</p>
            </div>
        </div>
    @endforelse
</div>