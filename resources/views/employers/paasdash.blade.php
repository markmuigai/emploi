@extends('layouts.dashboard-layout')

@section('title','Emploi :: PAAS')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Management Dashboard')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>


<style>

  .banner{
    margin: 0;
    padding: 0;
    background: linear-gradient(#500095 100%,#f2f2f2 100%);background:linear-gradient(to right,#500095,rgba(80,0,160,.3)), url(../images/seeker_services.jpg) no-repeat;
    background-size: cover;
    background-position: center;
    width: 100%;
    height: 27vh;
    overflow: hidden;
    color: white;
    text-align: left;
    padding-left: 20px;
    font-family: sans-serif;
    /* text-transform: uppercase; */

  }

  .banner h1{
    margin: 0;
    margin-top:10px;
  }

  .banner h2{
    margin: 0 0 20px 0;
  }

  .banner a{
    display: inline-block;
    padding: 10px 20px;
    background: #E87341;
    color: #ffffff;
    text-decoration: none;
    transition: 20s;
    margin-top:10px;
  }

  .banner a:hover{
    background: none;
    color: white;
  }



</style>

<div class="tab-content pt-2 mb-4 pb-5" id="PaaS Menu">

    <ul class="nav nav-tabs mb-4">
        <li class="btn btn-orange-alt mr-2 mb-1"><a href="/employers/admin-paas" style="text-decoration: none;">Administration</a></li>
        <li class="btn btn-orange-alt mr-2 mb-1"><a href="/employers/paas-tasks" style="text-decoration: none;">Task Management</a></li>
        <li class="btn btn-orange-alt mr-2 mb-1"><a href="/employers/invoice-paas" style="text-decoration: none;">Invoice and Subscription</a></li>
        <li class="btn btn-orange-alt mr-2 mb-1"><a href="/employers/requests" style="text-decoration: none;">Requests Management</a></li>

    </ul>
   

    <div class="row">
        <div class="col-md-8">
                <h4>Hire and Manage Professionals at One Stop.</h4>
            <div class="card">
                <div class="card-header" style="background-color:#554695; color: white;">
                    How it works
                </div>
                <div class="card-body">
                    <div class="card-text">
                    Follow the process defined below to use PaaS components fully.
                        <ul>
                            <li>Create new job request. <a href="/employers/request-paas" class="orange">Request Form.</a></li>
                            <li>Make payment upfront if not in E-Club, <a href="/employers/e-club" class="orange">Join E-Club.</a></li>
                            <li>Request made is forwarded to all job seekers in the same industry and those interested accept the request.</li>
                            <li>Pick from a pool of Emploi's shortlisted candidates.</li>
                            <li>Create new tasks under each job and define timeline.</li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4"><br>
            <div class="card">
                <div class="card-header" style="background-color:#554695; color:white;">
                    Get the Best
                </div>              
            </div>
            <div class="banner shadow-lg animate__animated animate__swing animate__infinite	infinite animate__slower 20s mt-4">
                <h1></h1>
                <h4>Hire Top Professionals on PaaS</h4>
                <a href="/employers/request-paas">Request</a>
            </div>
        </div>
    
    </div>

        <div class="col-md-8 align-items-right pt-2 mt-2">
            <div>
            @include('components.task-stats')
            </div>

        </div>

    
    <br><br><br>

</div>


@endsection
