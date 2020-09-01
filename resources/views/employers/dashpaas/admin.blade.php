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

<a href="{{ url()->previous() }}" class="btn btn-default">
    <i class="fa fa-arrow-left"></i>Back
</a>
<section>
    <div class="container">
        <ul class="nav nav-tabs mt-4">
          <li class="active btn btn-purple mr-4"><a data-toggle="tab" href="#home">Shortlisted</a></li>
          <li class="btn btn-orange-alt mr-4"><a data-toggle="tab" href="#docs">Documents</a></li>
          <li class="btn btn-purple mr-4"><a data-toggle="tab" href="#leave">Leave Requests</a></li>
          <li class="btn btn-orange-alt mr-4"><a data-toggle="tab" href="#off">Offboarding</a></li>

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
                    <div class="col-md-6 offset-md-3 mt-5">
                        <div class="card">
                            <div class="card-header">
                                <h5>Contract Signing</h5>
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
                                          <button id="clear" class="btn btn-danger btn-sm">Clear Signature</button>
                                          <textarea id="signature64" name="signed" style="display: none"></textarea>
                                      </div>
                                      <br/>
                                      <button class="btn btn-success">Save</button>
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
              </div>

            
          <br><br><br>
          </div>

          <div id="leave" class="tab-pane fade mt-2 pb-4">
            <h3>Shortlisted</h3>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <br><br><br>
          </div>

          <div id="off" class="tab-pane fade mt-2 pb-4">
            <h3>Shortlisted</h3>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
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
