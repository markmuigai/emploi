@extends('layouts.dashboard-layout')

@section('title','CV Review :: Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', $review->name.' CV Review')
<div class="container-fluid mb-5">
    <div class="row">
        <div class="col-md-12">
            <strong>
                Reviewed on: 
            </strong>
             {{$review->createdAt()}}
            <div class="card mt-2">
                <div class="card-header">
                    Recommendations
                </div>
                <div class="card-body">
                    <h4>
                        <span class="badge badge-pill badge-primary my-2">Score: {{$review->score}}</span>
                    </h4>
                    <p>Your CV is missing the following keywords:</p>
                    @foreach ($review->recommendations as $key => $rec)
                        <li class="list-inline-item">
                            <strong>
                                {{($key + 1).') '.ucfirst($rec->name)}}
                            </strong>
                        </li>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    CV Text
                </div>
                <div class="card-body">
                    <p>{{$review->cvText}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
