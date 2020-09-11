@extends('layouts.dashboard-layout')

@section('title','Emploi :: List of Available Part-timers')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', 'Available Part-timers')


<!-- NAV-TABS -->

<a href="{{ url()->previous() }}" class="btn btn-orange-alt ml-3">
    <i class="fa fa-arrow-left"></i> Back
</a>
<section>
    <div class="container">
        <ul class="nav nav-tabs mt-4">
          <li class="active btn btn-orange-alt mr-4"><a data-toggle="tab" href="#home">Shortlist</a></li>
          <li><a class="btn btn-orange-alt" href="/employers/request-paas">Request for Part-Timer</a></li>
        </ul>
      
        <div class="tab-content">
          <div id="home" class="tab-pane active mt-2 pb-4">

                <div class="container mt-4">
                  <table class="table">
                    <div class="row">
                      <tr>
                        <th>Shortlisted Candidates</th>
                      </tr>
                      @foreach ($pros as $p)
                        <tbody class="card">
                          <tr>
                          <td>
                          <div class="row">
                            <div class="col-md-3">
                                    <img src="{{ asset($p->user->getPublicAvatarUrl()) }}" style="width: 100%; border-radius: 50%">
                            </div>
                            <div class="col-md-7 mt-2">
                                <h5 class="text-left">{{ $p->user->name }}</h5>
                                <h5 class="text-left" style="color:orange;">Field of Expertise: {{ $p->user->seeker->industry->name }}</h5>
                                <h5 class="text-left" style="color:orange;">Experience: {{ $p->user->seeker->years_experience }}</h5>
                                @if($p->status == 'selected')
                                <a  class="btn btn-orange-alt mt-4">Hired</a>
                                @else
                                <a class="btn btn-orange mt-4" href="/employers/paas-hire/{{ $p->id }}"  onclick="return confirm('Are you sure to hire {{ $p->user->name }}?')">Hire</a>
                                @endif
                                <a href="/employers/browse/{{ $p->user->username }}" target="_blank" class="btn btn-orange mt-4">View Profile</a>
                            </div>
                          </div>
                            
                          </td>
                       
                          </tr>                      
                        </tbody>
                          
                      @endforeach
                  </table>


                </div>
                <br><br><br>

            
          </div>    
          
        </div>
      </div>
</section>


@endsection
