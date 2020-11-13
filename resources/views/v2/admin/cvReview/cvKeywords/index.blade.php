@extends('layouts.dashboard-layout')

@section('title','CV Review :: Emploi')

@section('question')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Keywords used for CV review')
    <div class="container-fluid mb-5">
        <div class="row justify-content-end">
            <div class="col-md-3 my-2">
                <a href="" class="btn btn-success float-right">
                    Add keyword
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card px-2 shadow mb-5 bg-white rounded">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($keywords as $key => $keyword)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{ucfirst($keyword->name)}}</td>
                                <td>
                                    <a class="btn btn-primary" href="#">
                                        Update
                                    </a>
                                    <a class="btn btn-danger" href="#">
                                        Delete
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