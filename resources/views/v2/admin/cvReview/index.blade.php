@extends('layouts.dashboard-layout')

@section('title','CV Review :: Emploi')

@section('question')
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
                        <p>Most missing keyword: </p>
                        {{ucfirst($missingKeyword)}}
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <a href="/admin" class="btn btn-primary">
                <i class="fa fa-arrow-left"></i> Back
            </a>
            <div class="row justify-content-end">
                <div class="col-md-5 my-2">
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
                        <th scope="col">Name</th>
                        <th scope="col">Output</th>
                        <th scope="col">Score</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cvReviews as $key => $review)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$review->name}}</td>
                            <td>
                                @if ($review->output == 'CV Parsed Successfully')
                                    <span class="text-success">
                                        {{$review->output}}</td>        
                                    </span>
                                @else
                                    <span class="text-danger">
                                        {{$review->output}}</td>        
                                    </span>
                                @endif
                            <td>{{$review->score}}%</td>
                            <td>
                                <a href="/v2/admin/cvReviews/{{ $review->id }}" class="btn btn-success">
                                    View Detailed results
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection