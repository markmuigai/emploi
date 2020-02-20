@extends('layouts.dashboard-layout')

@section('title','Emploi :: My Invites')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'My Invites')

<div class="card">
    <div class="card-body">
        
             
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import User Data</button>
                
            </form>
     

        
    </div>
</div>

@endsection
