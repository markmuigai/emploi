@extends('layouts.dashboard-layout')

@section('title','Emploi :: Search Results')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Search Results')

<div class="card">
    <div class="card-body">

            <div class="row" style="text-align: right; border-bottom: 0.1em solid #ff5e00">
                <a href="#" class="btn btn-primary">Search Results</a>  <hr>
            </div>


              <div class="col-sm-4" style="position: relative;">
            
                  <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="search for...">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-default">
                        Go
                      </button>
                    </span>
                  </div>
                </form>
              </div>
        <div class="row">
              @if(count($documentations) > 0)
                    @foreach($documentations->all() as $doc)     
            <div class="col-md-10 offset-md-1">                
                    <h3><strong>{{ $doc->title }}</strong></h3>
                     <p>{{ $doc->content }}</p>
                             
            </div>
        
        @endforeach
        @else
        <p class="text-center" style="color: red">
           No Result found.
        </p>
        </div>
        @endif


    	</div>      
  </div>
@endsection