@extends('layouts.dashboard-layout')

@section('title','Emploi :: Admin PaaS')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Administration')

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>

<link rel="stylesheet" type="text/css" href="http://keith-wood.name/css/jquery.signature.css">

<style>
    .kbw-signature { width: 200px; height: 100px;}
    #sig canvas{
        width: 100% !important;
        height: 100% !important;
    }
</style>
<!-- NAV-TABS -->

<a href="/employers/paas-dash" class="btn btn-orange">
    <i class="fa fa-arrow-left"></i> Back Home
</a>
<section>
    <div class="container">
        <ul class="nav nav-tabs mt-4">
          <li class="active btn btn-orange-alt mr-4 mb-1"><a data-toggle="tab" href="#home">Hired</a></li>
          <li class="btn btn-orange-alt mr-4 mb-1"><a data-toggle="tab" href="#docs">Contract Signing</a></li>
          <li class="btn btn-orange-alt mr-4 mb-1"><a data-toggle="tab" href="#off">Offboarding</a></li>

        </ul>
      
        <div class="tab-content">
          <div id="home" class="tab-pane active mt-2 pb-4">
              <div class="container mt-4">
              @if(session()->has('hired'))
                <div class="alert alert-success">
                {{ session()->get('hired') }}
                </div>
              @endif
                <table class="table">
                  <div class="row">
                    <tr>
                      <th>Status</th>
                      <th>Name</th>


                    </tr>
                    @foreach ($shortlisted as $prof)
                      <tbody>
                        <tr>
                        <td>{{ $prof->status}}</td>
                        <td>{{ $prof->user->name }}</td>

                        <td><a href="/employers/browse/{{ $prof->user->username }}" target="_blank" style="color: blue">view</a></td>
                        @if($prof->status == 'selected')
                        <td><a href="#" style="color: blue">Hired</a></td>
                        @else
                        <td><a class="btn btn-primary" href="/employers/paas-hire/{{ $prof->id }}"  onclick="return confirm('Are you sure to hire {{ $prof->user->name }}?')">Hire</a></td>
                        @endif

                        </tr>                      
                      </tbody>
                        
                    @endforeach
                </table>

                {{ $tasks->links() }}

              </div>
              <br><br><br>

          </div>

          <div id="docs" class="tab-pane fade mt-2 pb-4">

  
              <div>

              <div class="row">
                  <img src="#" alt="contract view" style="width:100%; height:90%;pointer-events: none;" class="shadow">
              </div>

                <div class="row">
                    <div class="col-md-6 offset-md-3 mt-5">
                        <div class="card">
                            <div class="card-header">
                                <h5>Signing Area</h5>
                            </div>
                            <div class="card-body">
                                  @if ($message = Session::get('success'))
                                      <div class="alert alert-success  alert-dismissible">
                                          <button type="button" class="close" data-dismiss="alert">×</button>  
                                          <strong>{{ $message }}</strong>
                                      </div>
                                  @endif
                                  <form method="POST" action="{{ route('signaturepad.upload') }}">
                                      @csrf
                                      <div class="col-md-12">
                                          <label class="" for="">Signature:</label>
                                          <br/>
                                          <div id="sig" ></div>
                                          <br/>
                                          <textarea id="signature64" name="signed" style="display: none"></textarea>
                                      </div>
                                      <br/>
                                      <button id="clear" class="btn btn-orange-alt ml-3">Clear</button>
                                      <button class="btn btn-orange ml-2">Save</button>
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
              </div>

            
          <br><br><br>
          </div>


          <div id="off" class="tab-pane fade mt-2 pb-4">
            <h3>Offboarding Management</h3>
            <br><br><br> 
          </div>
          
          
        </div>
      </div>

      
      <script type="text/javascript">
          var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
          $('#clear').click(function(e) {
              e.preventDefault();
              sig.signature('clear');
              $("#signature64").val('');
          });
      </script>
</section>

@endsection
