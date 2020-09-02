@extends('layouts.dashboard-layout')

@section('title','Emploi :: PAAS')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'All About PaaS')
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
   
    <div class="row pb-4 nav">
        <div class="col-md-12 d-flex container">
            <div class="btn btn-orange-alt p-2 mr-2"><a href="/employers/admin-paas" style="text-decoration: none;"><span class="span">Administration</span></a></div>
            <div class="btn btn-orange-alt p-2 mr-2"><a href="/employers/paas-tasks" style="text-decoration: none;"><span class="span">Task Management</span></a></div>
            <div class="btn btn-orange-alt p-2 mr-2"><a href="/employers/invoice-paas" style="text-decoration: none;"><span class="span">Invoice and Subscription</span></a></div>
            <div class="btn btn-orange-alt p-2 mr-2"><a href="/employers/requests" style="text-decoration: none;"><span class="span">Requests Management</span></a></div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:#554695; color: white;">
                    How it works
                </div>
                <div class="card-body">
                    <div class="card-text">
                    Follow the process defined below to use PaaS components fully.
                        <ul>
                            <li>Create new task request.</li>
                            <li>Make payment upfront if not in E-Club.</li>
                            <li>Request made is forwarded to all Job Seekers in the same industry and those interested accept the request.</li>
                            <li>Pick from a pool of shortlisted candidates.</li>
                            <li>Create new issues under each task and define timeline.</li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header" style="background-color:#554695; color:white;">
                    Get the Best
                </div>              
            </div>
            <div class="banner shadow-lg animate__animated animate__zoomInUp animate__infinite	infinite animate__slower 20s mt-4">
                <h1></h1>
                <h4>Hire Top Professionals on PaaS</h4>
                <a href="/employers/request-paas">Request</a>
            </div>
        </div>
    
    </div>



    <!--Carousel Wrapper-->
<div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

<!--Controls-->
<div class="controls-top">
  <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
  <a class="btn-floating" href="#multi-item-example" data-slide="next"><i
      class="fas fa-chevron-right"></i></a>
</div>
<!--/.Controls-->

<!--Indicators-->
<ol class="carousel-indicators">
  <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
  <li data-target="#multi-item-example" data-slide-to="1"></li>
  <li data-target="#multi-item-example" data-slide-to="2"></li>
</ol>
<!--/.Indicators-->

<!--Slides-->
<div class="carousel-inner" role="listbox">

  <!--First slide-->
  <div class="carousel-item active">

    <div class="col-md-4">
      <div class="card mb-2">
        <img class="card-img-top"
          src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(34).jpg"
          alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">Card title</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
            card's content.</p>
          <a class="btn btn-primary">Button</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card mb-2">
        <img class="card-img-top"
          src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(18).jpg"
          alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">Card title</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
            card's content.</p>
          <a class="btn btn-primary">Button</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card mb-2">
        <img class="card-img-top"
          src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/4-col/img%20(35).jpg"
          alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">Card title</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
            card's content.</p>
          <a class="btn btn-primary">Button</a>
        </div>
      </div>
    </div>

  </div>
  <!--/.First slide-->

  <!--Second slide-->
  <div class="carousel-item">

    <div class="col-md-4">
      <div class="card mb-2">
        <img class="card-img-top"
          src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(60).jpg" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">Card title</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
            card's content.</p>
          <a class="btn btn-primary">Button</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card mb-2">
        <img class="card-img-top"
          src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(47).jpg" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">Card title</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
            card's content.</p>
          <a class="btn btn-primary">Button</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card mb-2">
        <img class="card-img-top"
          src="https://mdbootstrap.com/img/Photos/Horizontal/City/4-col/img%20(48).jpg" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">Card title</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
            card's content.</p>
          <a class="btn btn-primary">Button</a>
        </div>
      </div>
    </div>

  </div>
  <!--/.Second slide-->

  <!--Third slide-->
  <div class="carousel-item">

    <div class="col-md-4">
      <div class="card mb-2">
        <img class="card-img-top"
          src="https://mdbootstrap.com/img/Photos/Horizontal/Food/4-col/img%20(53).jpg" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">Card title</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
            card's content.</p>
          <a class="btn btn-primary">Button</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card mb-2">
        <img class="card-img-top"
          src="https://mdbootstrap.com/img/Photos/Horizontal/Food/4-col/img%20(45).jpg" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">Card title</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
            card's content.</p>
          <a class="btn btn-primary">Button</a>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card mb-2">
        <img class="card-img-top"
          src="https://mdbootstrap.com/img/Photos/Horizontal/Food/4-col/img%20(51).jpg" alt="Card image cap">
        <div class="card-body">
          <h4 class="card-title">Card title</h4>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
            card's content.</p>
          <a class="btn btn-primary">Button</a>
        </div>
      </div>
    </div>

  </div>
  <!--/.Third slide-->

</div>
<!--/.Slides-->

</div>
<!--/.Carousel Wrapper-->

    
    <br><br><br>

</div>


@endsection
