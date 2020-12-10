@extends('layouts.dashboard-layout')

@section('title','Self Assessment :: Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Self-assessment Results')
<div class="container-fluid mb-5">
    <a href="{{ url()->previous() }}" class="btn btn-primary">
       <i class="fa fa-arrow-left"></i> Back
    </a>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <h4>
                        <p>Assessments Done:</p>
                        {{$assessments_count}}
                    </h4>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <h4>
                        <p>Average score:</p>
                        {{$avg}}/10
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row justify-content-end">
               <div class="form-group col-md-3 pr-0 my-2">
                    <form>
                        <select id="inputRating" name="sortbydate" class="form-control">
                          <option value="">Select Date Range</option>
                          <option value="today">Today</option>
                          <option value="last7">Last 7 days</option>
                          <option value="thisMonth">This month</option>
                        </select>
                    </form>
                </div>
                <div class="col-md-4 my-2">
                    <a href="{{Route('assessments.index')}}" class="btn btn-success">
                        View All Assessment Questions
                    </a>
                </div>
            </div>
            <div class="card align-items-center px-2 shadow mb-5 bg-white rounded">
                @if ($emailsAssessed->isEmpty())
                    <h4 class="text-center m-5">
                        No assessment results available
                    </h4>
                @else
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th scope="col">Recent Score</th>
                            <th scope="col">Done</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($emailsAssessed as $key => $email)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$email}}</td>
                                <td>{{App\Performance::recentScore($email)}}\10</td>
                                <td>{{App\Performance::daysSince($email)}}</td>
                                <td>
                                    <a href="{{route('assessmentResults.show', ['email' => $email])}}" class="btn btn-primary">
                                        View Detailed Results
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            {{ $emailsAssessed->links() }}
        </div>
    </div>
</div>
<script type="text/javascript">
 
    $("#inputRating").change(function() {
     this.form.submit();
    });

</script>
@endsection
