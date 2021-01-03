@extends('layouts.dashboard-layout')

@section('title','CV Review :: Emploi')

@section('question')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Manage keywords used for CV review')
    <div class="container-fluid mb-5">
        <a href="{{ url()->previous() }}" class="btn btn-primary">
            <i class="fa fa-arrow-left"></i> Back
        </a>
        <div class="row justify-content-end">
            <div class="col-md-3 my-2">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addKeyword">
                    Add Keyword
                </button>
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
                                    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateKeyword">
                                        Update
                                      </button> --}}
                                    <form style="display: inline-block" action="{{route('CVKeywords.destroy', ['CVKeyword' => $keyword])}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit"class="btn btn-danger">
                                            Delete
                                        </button>
                                    </form>
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

@section('modals')
    <!-- Add Keyword Modal -->
    <div class="modal fade" id="addKeyword" tabindex="-1" aria-labelledby="addKeywordLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="form" action="{{route('CVKeywords.store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="keyword">Enter Keyword</label>
                        <input class="form-control" type="text" name="keyword" id="">
                    </div>
                    <button type="submit" class="btn btn-primary ">Add Keyword</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection