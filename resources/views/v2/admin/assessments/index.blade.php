@extends('layouts.dashboard-layout')

@section('title','Self Assessment :: Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Self-assessment Questions')
<div class="container-fluid mb-5">
    <div class="row">
        <div class="col-md-12">
            <div class="row justify-content-end">
                <div class="col-md-3 my-2">
                    <a href="{{route('assessments.create')}}" class="btn btn-success">
                        Add question
                    </a>
                </div>
            </div>
            <div class="card align-items-center px-2 shadow mb-5 bg-white rounded">
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <th style="width: 500px;" scope="col">Question</th>
                        <th scope="col">Level</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($questions as $question)
                        <tr>
                            <td>{{$question->title}}</td>
                            <td>{{$question->difficulty_level}}</td>
                            <td>
                                <a class="btn btn-primary" data-toggle="collapse" 
                                    href="#viewChoice-{{$question->id}}" role="button" aria-expanded="false" aria-controls="viewChoice-{{$question->id}}">
                                    View Choices
                                </a>
                                <a href="" class="btn btn-danger">
                                    Disable
                                </a>
                            </td>
                        </tr>
                        <tr class="collapse" id="viewChoice-{{$question->id}}">
                            <td colspan="3">
                                @foreach ($question->choices as $key => $choice)
                                    @if ($choice->correct_value == 1)
                                        <p>{{($key+1).') '.$choice->value}}
                                            <span class="ml-1 badge badge-success">Correct</span>
                                        </p>
                                    @else
                                        <p>{{($key+1).') '.$choice->value}} </p>
                                    @endif
                                @endforeach
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
