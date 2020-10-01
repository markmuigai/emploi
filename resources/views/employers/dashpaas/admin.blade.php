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
    <div class="container"><br>
      <h4>See all your Latest Hires.</h4>
        <ul class="nav nav-tabs mt-4">
          <li class="active btn btn-orange-alt mr-4 mb-1"><a data-toggle="tab" href="#home">Hired</a></li>
   <!--        <li class="btn btn-orange-alt mr-4 mb-1"><a data-toggle="tab" href="#docs">Contract Signing</a></li>
          <li class="btn btn-orange-alt mr-4 mb-1"><a data-toggle="tab" href="#off">Offboarding</a></li> -->

        </ul>
      
        <div class="tab-content">
          <div id="home" class="tab-pane active mt-2 pb-4">
              <div class="container mt-4">
              @if(session()->has('hired'))
                <div class="alert alert-success">
                {{ session()->get('hired') }}
                </div>
              @endif
              @if(count($shortlisted) > 0)
                <table class="table">
                  <div class="row">
                    <tr>
                      <th>Name</th>


                    </tr>
                    @foreach ($shortlisted as $prof)
                      @if($prof->status == 'selected')
                      <tbody>
                        <tr>
                        <td>{{ $prof->user->name }}</td>

                        <td><a href="/employers/browse/{{ $prof->user->username }}" target="_blank" style="color: blue">view</a></td>
                        <td><a href="#" style="color: blue">Hired</a></td>
                     <!--    <td><a class="btn btn-primary" href="/employers/paas-hire/{{ $prof->id }}"  onclick="return confirm('Are you sure to hire {{ $prof->user->name }}?')">Hire</a></td> -->
                        </tr>                      
                      </tbody>
                      @endif  

                    @endforeach
                  </div>
                </table>
                {{ $tasks->links() }}
                @else
                <p>No list of Hired Staff</p>
                @endif

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
            <h4>Offboarding Management</h4>
            <h6>Create offboarding tasks</h6>
            <?php
                $user=Auth()->user();
                $ot = App\OffboardingTask::where('user_id', $user->id)->get();
            ?>
            <div class="tab-content">
                <div id="home" class="tab-pane active mt-2 pb-4">
                    <div class="container mt-4">


                       <table class="table">
                            <div class="row">
                              <tr>
                                <th>Title</th>
                                <th>Assigned To</th>
                                <th>Status</th>
                                <th><a href="/employers/offboarding/tasks" style="color: blue">Create New Task</a></th>
                                </td>
                              @forelse($ot as $o)
                                <tbody>
                                  <tr>
                                  <td>{{ $o->title }}</td>
                                  <td>{{ $o->assigned_to }}</td>
                                  <td>{{ $o->status }}</td>

                                  <td><a href="/employers/offboarding/view/{{ $o->id }}" style="color: blue">view more details</a></td>

                                  <td><a href="/employers/offboarding/edit/{{ $o->id }}" style="color: blue">Edit</a></td>

                                  <td><a href="/employers/offboarding/delete/{{ $o->id }}" style="color: blue">Delete</a></td>
                                  </tr>                      
                                </tbody>
                              @empty
                              <p>There is no offboarding task. You can create a task here</p>                                  
                              @endforelse
                          </table>
                      </div>
                  </div>
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
