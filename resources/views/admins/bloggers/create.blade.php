@extends('layouts.dashboard-layout')

@section('title','Emploi :: Create Blogger')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Create Blogger')


<div class="card">
    <div class="card-body">
        @include('components.ads.responsive')
        <div class="row align-items-center">
            <div class=" col-lg-7 col-md-8 offset-md-2">
                <form method="POST" action="/admin/bloggers">
                    @csrf
                    <p>
                        <label>Email:</label>
                        <input type="email" name="email" class="form-control" required="">
                    </p>
                    <p>
                        <label>Status: </label>
                        <select name="status" class="form-control">
                            <option value="active">Active</option>
                            <option value="inactive">Not Active</option>
                        </select>
                    </p>
                    <p>
                        <input type="submit" value="Save Blogger" class="btn btn-primary btn-sm">
                    </p>
                </form>
            </div>
        </div>
        <hr>
    </div>
</div>



@endsection