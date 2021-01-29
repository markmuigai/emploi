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
                        {{$avg}}%
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
                @if ($testResults->isEmpty())
                    <h4 class="text-center m-5">
                        No assessment results available
                    </h4>
                @else
                    <table class="table table-hover">
                        <thead class="text-center">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th scope="col">Score</th>
                            <th scope="col">Type</th>
                            <th scope="col">Experience</th>
                            <th scope="col">Done</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($testResults as $key => $testResult)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $testResult->email }}</td>
                                <td>{{ $testResult->score }}%</td>
                                <td>{{ $testResult->type }}</td>
                                @if(isset($testResult->user->id))
                                    <td>{{ $testResult->user->seeker->years_experience }} years</td>
                                @else
                                    <td>Unavailable</td>
                                @endif
                                <td>{{ $testResult->performances->last()->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="{{route('assessmentResults.show', ['email' => $testResult->email])}}" class="btn btn-primary"><i class="far fa-eye" data-toggle="tooltip"  title="View detailed results"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
            {{ $testResults->links() }}
        </div>
    </div>
</div>
<script type="text/javascript">
 
    $("#inputRating").change(function() {
     this.form.submit();
    });

</script>
@endsection
