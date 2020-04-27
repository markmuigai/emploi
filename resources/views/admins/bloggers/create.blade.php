@extends('layouts.dashboard-layout')

@section('title','Emploi :: Create Blogger')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Create Blogger')


<div class="card">
    <div class="card-body">
        <div class="row align-items-center">
            <div class=" col-lg-7 col-md-8 offset-md-2">
                <form method="POST" action="/admin/bloggers">
                    @csrf
                    <p>
                        <label>Full Name: <b style="color: red" title="Required">*</b></label>
                        <input type="text" name="name" class="form-control" required="">
                    </p>
                    <p>
                        <label>Email: <b style="color: red" title="Required">*</b></label>
                        <input type="email" name="email" class="form-control" required="">
                    </p>
                    <p>
                        <label>Status: <b style="color: red" title="Required">*</b></label>
                        <select name="status" class="form-control">
                            <option value="active">Active</option>
                            <option value="inactive">Not Active</option>
                        </select>
                    </p>
                    <p>
                        <input type="submit" value="Save Blogger" class="btn btn-orange btn-sm">
                    </p>
                </form>
            </div>
        </div>
        @include('components.ads.responsive')
        <hr>
    </div>
</div>



@endsection