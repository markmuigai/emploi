@extends('layouts.dashboard-layout')

@section('title','Self Assessment :: Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Self-assessment Results')
<div class="container-fluid mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="row justify-content-end">
                <div class="col-md-6 my-2">
                    <a href="" class="btn btn-success">
                        Add assessment
                    </a>
                    <a href="{{Route('assessments.index')}}" class="btn btn-success">
                        View All Assessment Questions
                    </a>
                </div>
            </div>
            <div class="card align-items-center px-2 shadow mb-5 bg-white rounded">
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">Email</th>
                        <th scope="col">Recent Score</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($emailsAssessed as $email)
                        <tr>
                            <td>{{$email}}</td>
                            <td>{{App\Performance::recentScore($email)}}\10</td>
                            <td>
                                <a href="/v2/self-assessment?email={{ $email }}" class="btn btn-primary">
                                    View Detailed Results
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
