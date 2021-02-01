@extends('layouts.dashboard-layout')

@section('title','CV Review :: Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'CV Reviews')
<div class="container-fluid mb-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h4>
                        <p>CV Reviews done:</p>
                        {{$count}}
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h4>
                        <p>Average score:</p>
                        {{$avg}}%
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <h4>
                        <p>Converted to CV Editing</p>
                        {{ $convertedEmails->count() }}
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="/admin" class="btn btn-orange">
                <i class="fa fa-arrow-left"></i> Back
            </a>
            <div class="row justify-content-end">          
                    <div class="form-group col-md-3 pr-0 my-2">
                        <form>
                            <select id="inputRating" name="sortbydate" class="form-control">
                              <option value="">Select Date Range</option>
                              <option value="today">Last 24 hours</option>
                              <option value="last7">Last 7 days</option>
                              <option value="thisMonth">This month</option>
                            </select>
                        </form>
                    </div>
                <div class="col-md-5 pl-0 pr-3 my-2">
                    <a href="/v2/admin/cvTests" class="btn btn-success float-right">
                        CV Review Tester
                    </a>
                    <a href="/v2/admin/CVKeywords" class="btn btn-success float-right">
                        Manage Keywords 
                    </a>
                </div>
            </div>
            <div class="card px-2 shadow mb-5 bg-white rounded">
                @if ($cvReviews->isEmpty())
                    <h4 class="text-center m-5">
                        No CV Reviews available
                    </h4>
                @else
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Email</th>
                        <th scope="col">Converted</th>
                        <th scope="col">Experience</th>
                        <th scope="col">Score</th>
                        <th scope="col">Created</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cvReviews as $key => $review)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>
                                {{$review->email}}
                            </td>
                            <td>
                                @if ($convertedEmails->search($review->email) == false)
                                    No
                                @else
                                    Yes
                                @endif
                            </td>
                            @if(isset($review->user->seeker->id))
                                    <td>{{ $review->user->seeker->years_experience }} years</td>
                                @else
                                    <td>Unavailable</td>
                                @endif
                                
                            <td>{{$review->score}}%</td>
                            <td>{{ $review->created_at->diffForHumans() }}</td>
                            <td>
                                 <a href="/v2/admin/cvReviews/{{ $review->id }}" class="btn btn-success">
                                    <i class="far fa-eye" data-toggle="tooltip"  title="View detailed results"></i>
                                </a>
                                @if($review->path!='')
                                    <a href="/v2/admin/cv-review/download/{{ $review->id }}" class="btn btn-success">
                                        <i class="fa fa-download" data-toggle="tooltip"  title="Download CV"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
                {{ $cvReviews->links() }}
        </div>
    </div>
</div>

<script type="text/javascript">
 
    $("#inputRating").change(function() {
     this.form.submit();
    });

</script>
@endsection