@extends('layouts.dashboard-layout')

@section('title','Emploi Admin :: Documentation')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('page_title', 'Documentation')

@section('content')

<div class="card">
    <div class="card-body">
        <div class="row" style="text-align: right; border-bottom: 0.1em solid #ff5e00">
            <a href="/desk/documentation/create" class="btn btn-primary">Create Documentation</a>  <br><hr>
        </div>


              <div class="col-md-4" style="left: 470px;">
                <form method="POST" action='{{url("/desk/documentation/search")}}'>
                 @csrf                
                  <div class="input-group" >
                    <input type="text" name="search" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-default">
                        Go
                      </button>
                    </span>
                  </div>
                </form>
              </div>
        <div class="row">
        @forelse($documentations as $doc)        
            <div class="col-md-10 offset-md-1"> 
                  <h4>{{ $doc->parent_id }}</h4>               
                    <h3><strong>{{ $doc->title }}</strong></h3>
                     <p>{{ $doc->content }}</p>

            <div class="text-right">    
            <a href="/desk/documentation/{{$doc->id}}/edit" class="btn btn-link btn-sm">Edit</a>
            </div>
                <hr>
                
            </div>
        
        
        @empty
        <p class="text-center" style="color: red">
            Documentation not found.
        </p>
        </div>
        @endforelse
    </div>
</div>
{{ $documentations->links() }}
@endsection