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
          <li><a class="btn btn-orange-alt" style="color: black;" data-toggle="tab" href="#menu1">Shortlist</a></li>
        </ul>
      
        <div class="tab-content">
          <div id="home" class="tab-pane active mt-2 pb-4">

                <div class="container mt-4">
                  <table class="table">
                    <div class="row">
                      <tr>
                        <th>Request ID</th>
                        <th>Request Status</th>

                      </tr>
                      @foreach ($tasks as $task)
                        <tbody>
                          <tr>
                          <td>{{ $task->slug }}</td>
                          <td>{{ $task->status }}</td>
                          <td><a href="#" style="color: blue">Edit</a></td>
                          <td><a href="#" style="color: blue">Cancel</a></td>
                          <td><a href="/employers/view-task/{{ $task->slug }}" style="color: blue">View</a></td>
                          </tr>                      
                        </tbody>
                          
                      @endforeach
                  </table>

                  {{ $tasks->links() }}

                </div>
                <br><br><br>

            
          </div>


          <div id="menu1" class="tab-pane fade mt-2 pb-4">
            <div class="container mt-4">
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

                        <td><a href="/employers/browse/{{ $prof->user->username }}" target="_blank" style="color: blue">View</a></td>
                        <td><a href="/employers/paas-hire" style="color: blue">Hire</a></td>

                        </tr>                      
                      </tbody>
                        
                    @endforeach
                </table>

                {{ $tasks->links() }}

              </div>
              <br><br><br>

          </div>
          
          
          
        </div>
      </div>
</section>


@endsection
