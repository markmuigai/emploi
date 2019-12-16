@extends('layouts.dashboard-layout')

@section('title','Emploi :: Apply '.$post->title)

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Apply as '.$post->title)

<div class="card">
    <div class="card-body">
        <div class="text-right">
            <a href="/vacancies/{{ $post->slug }}" class="btn btn-sm btn-purple">View Job</a>
            <a href="#share-links" class="btn btn-sm btn-orange-alt">Share</a>
        </div>
        <div class="row align-items-center">
            <div class="col-md-6">
                <?php $img = $post->image == 'unknown.png' ? 'images/a1.jpg' : $post->image ?>
                <img src="{{ asset($post->imageUrl) }}" class="img-responsive w-100" alt="{{ $post->title }}" />
            </div>
            <div class="col-md-6">
                <p><strong>Posted: </strong>{{ $post->since }}</p>
                <p><strong>Position: </strong>{{ $post->vacancyType->name }}</p>
                <p><strong>Company: </strong>{{ isset(Auth::user()->id) ? $post->company->name : 'Login to view' }}</p>
                <p><strong>Location: </strong>{{ $post->location->name }}, {{ $post->location->country->name }}</p>
                <p><strong>Apply by: </strong>{{ $post->deadline }}</p>
                <p><strong>Education Requirements: </strong>{{ $post->education_requirements }}, {{ $post->industry->name }}</p>
                <p><strong>Experience: </strong>{{ $post->experience_requirements }}</p>
                <p><strong>Salary: </strong>{{ isset(Auth::user()->id) ? '~ '.$post->location->country->currency.' '.$post->monthly_salary.' p.m.' : 'Login to view' }}</p>
                <p><strong>Number of Openings: </strong>{{ $post->positions }}</p>
            </div>
        </div>
        <hr>

        <div class="text-center pt-3">
            <h3 class="orange">Application for {{ $post->title }}</h3>
        </div>
        <form method="post" action="/vacancies/{{ $post->slug }}/apply">
            @csrf
            <div class="form-group">
                <label>Cover Letter:</label>
                <textarea class="form-control" name="cover" rows="5" id="cover" placeholder="Compose cover letter" required="required"></textarea>
            </div>

            <div class="form-group">
                <input type="checkbox" checked="" name="follow"> Follow {{ $post->company->name }}
            </div>

            <button type="submit" name="button" class="btn btn-orange">Submit Application</button>

            <p>
                <em>Your profile and resume will be made available to {{ $post->company->name }}. <a href="/profile/edit" class="orange">Edit my profile</a></em>
            </p>
        </form>




        <div class="comments" style="display: none;">
            <h6>Comments</h6>
            <div class="media media_1">
                <div class="media-left"><a href="#"> </a></div>
                <div class="media-body">
                    <h4 class="media-heading"><a class="author" href="#">Sollicitudin</a><a class="reply" href="#">Reply</a>
                        <div class="clearfix"> </div>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec
                    lacinia congue felis in faucibus.
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="media">
                <div class="media-left"><a href="#"> </a></div>
                <div class="media-body">
                    <h4 class="media-heading"><a class="author" href="#">Sollicitudin</a><a class="reply" href="#">Reply</a>
                        <div class="clearfix"> </div>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec
                    lacinia congue felis in faucibus.
                </div>
            </div>
        </div>
        <form style="display: none;">
            <div class="to">
                <input type="text" class="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}">
                <input type="text" class="text" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">
            </div>
            <div class="text">
                <textarea value="Message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message';}">Message</textarea>
            </div>
            <div class="form-submit1">
                <input name="submit" type="submit" id="submit" value="Submit"><br>
            </div>
            <div class="clearfix"></div>
        </form>
    </div>
</div>
</div>
<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    setTimeout(function() {

        CKEDITOR.replace('cover');

    }, 3000);
</script>

@endsection
