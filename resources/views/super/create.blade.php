@extends('layouts.dashboard-layout')

@section('title','Emploi :: Create Admin')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Create Administrators')

<div class="card">
    <div class="card-body">
        <form method="post" action="/desk/create-admin">
            @csrf
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" placeholder="" class="form-control">
            </div>
            <div class="form-group">
                <label>Username:</label>
                <input type="text" name="username" placeholder="" class="form-control">
            </div>

            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" placeholder="" class="form-control">
            </div>

            <div class="form-group">
                <label>Country:</label>
                <select class="custom-select" name="country">
                    @foreach($countries as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" placeholder="" class="form-control">
            </div>
            <div class="text-right">
                <button type="submit" name="button" class="btn btn-orange">Submit</button>
            </div>
        </form>

    </div>
    <div class="clearfix"> </div>
</div>
</div>

@endsection