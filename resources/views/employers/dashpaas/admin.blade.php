@extends('layouts.dashboard-layout')

@section('title','Emploi :: Admin PaaS')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Administration')


<!-- NAV-TABS -->

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
                        <td><a href="/employers/paas-hire/{{ $prof->id }}" style="color: blue">Hire</a></td>
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
            <h3>Shortlisted</h3>
            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
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
</section>


@endsection
