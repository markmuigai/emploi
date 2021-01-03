@extends('layouts.dashboard-layout')

@section('title','Manage News Letter :: Emploi')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Manage news letter subscription')

<div class="card">
    <div class="card-body">
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
        <br>
        <form method="post" action="/v2/news-letter/{{ $subscriber->id }}" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}            

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" placeholder="" value="{{ $subscriber->name }}" readonly="" class="form-control" maxlength="255">
                   <label>Email</label>
                <input type="text" name="email" placeholder="" value="{{ $subscriber->email}}" readonly="" class="form-control" maxlength="255">
            </div>

            <hr>
            <div class="text-right">
            <button type="submit" name="button" class="btn btn-orange">Unsubscribe</button>
        </form>
    </div>
</div>

@endsection
