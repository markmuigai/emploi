@extends('layouts.dashboard-layout')

@section('title','Emploi :: PAAS')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'PaaS Employer Dashboard')

<div class="tab-content pt-2 mb-4 pb-5" id="PaaS Menu">
   
    <div class="row pb-4">
        <div class="col-md-12 d-flex">
            <div class="btn btn-orange p-2"><a href="/employers/admin-paas" style="text-decoration: none;"><span class="span">Administration</span></a></div>
            <div class="btn btn-orange-alt p-2 ml-4"><a href="/employers/paas-tasks" style="text-decoration: none;"><span class="span">Task Management</span></a></div>
        </div>
    </div>

    <div class="row pb-4">
        <div class="col-md-12 d-flex">
            <div class="btn btn-orange-alt p-2"><a href="/employers/invoice-paas" style="text-decoration: none;"><span class="span">Invoice and Subscription</span></a></div>
            <div class="btn btn-orange p-2 ml-4"><a href="/employers/requests" style="text-decoration: none;"><span class="span">Requests Management</span></a></div>
        </div>
    </div>
    
    <br><br><br>

</div>


@endsection
