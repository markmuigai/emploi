@extends('layouts.dashboard-layout')

@section('title','Emploi :: All Requests')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Request Management')


<!-- NAV-TABS -->

<section>
    <div class="container">
        <ul class="nav nav-tabs mt-4">
          <li class="active btn btn-orange mr-4"><a data-toggle="tab" href="#home">Requests</a></li>
          <li><a class="btn btn-orange-alt" style="color: black;" data-toggle="tab" href="#menu1">Shortlisted</a></li>
        </ul>
      
        <div class="tab-content">
          <div id="home" class="tab-pane active mt-2 pb-4">
            <h3>Requests</h3>
            <div class="container">
                <div class="row">
                    
                </div>
            </div>
          </div>
          <div id="menu1" class="tab-pane fade mt-2 pb-4">
            <h3>Shortlisted</h3>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
          
          
        </div>
      </div>
</section>


@endsection
