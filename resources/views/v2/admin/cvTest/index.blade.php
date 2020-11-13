@extends('layouts.dashboard-layout')

@section('title','CV Review :: Emploi')

@section('question')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'CV Testing')
<div class="container-fluid mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="row justify-content-end">
                <div class="col-md-3 my-2">
                    <a href="{{route('cvTests.create')}}" class="btn btn-success float-right">
                        Test CV Review
                    </a>
                </div>
                @if ($cvTests->isNotEmpty())
                    <div class="col-md-3 my-2">
                        <form style="display: inline-block" action="{{route('cvTests.deleteAll')}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger float-left">
                                Delete Test results
                            </button>
                        </form>
                    </div>
                @endif
            </div>
            <div class="card px-2 shadow mb-5 bg-white rounded">
                @if ($cvTests->isEmpty())
                    <h4 class="text-center m-5">
                        No CV Test Results available
                    </h4>
                @else
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Output</th>
                        <th scope="col">Score</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cvTests as $test)
                        <tr>
                            <td>{{$test->name}}</td>
                            <td>
                                @if ($test->output == 'CV Parsed Successfully')
                                    <span class="text-success">
                                        {{$test->output}}</td>        
                                    </span>
                                @else
                                    <span class="text-danger">
                                        {{$test->output}}</td>        
                                    </span>
                                @endif
                            <td>{{$test->score}}</td>
                            <td>
                                <a class="btn btn-primary" data-toggle="collapse" 
                                    href="#viewText-{{$test->id}}" role="button" aria-expanded="false" aria-controls="viewText-{{$test->id}}">
                                    View CV Text
                                </a>
                            </td>
                        </tr>
                        <tr class="collapse" id="viewText-{{$test->id}}">
                            <td colspan="4">
                                <p>{{$test->cvText}}</p>
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