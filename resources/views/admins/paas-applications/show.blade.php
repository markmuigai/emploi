@extends('layouts.dashboard-layout')

@section('title','Emploi :: Paas Shortlisting ')

@section('description')
Emploi is the Leading Platform for Recruitment and Placement Solutions for SMEs in the job marketplace.
@endsection

@section('content')
@section('page_title', $task->title.' Candidates')


<!-- NAV-TABS -->

<div class="row">
    <div class="col-lg-9 col-12">
        <!-- NAV-TAB CONTENT -->
        <div class="tab-content pt-2" id="allCandidatesContent">
            <!-- ALL CANDIDATES -->
            <div class="tab-pane fade show active" id="all-candidates" role="tabpanel" aria-labelledby="all-candidates-tab">
                <?php  $kk=0; $shown = []; ?>

                <!-- JOB CARD -->
                
                @forelse($pool as $a)
                    <div class="card mb-2" 
    @if($a->user->seeker->featured > 0)

        style="border: 0.1em solid #e88725"

    @endif
    >
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col-lg-2 col-4">
                <img src="{{ asset($a->user->getPublicAvatarUrl()) }}" class="avatar-small" alt="{{ $a->user->name }}">
            </div>
            <div class="col-8 col-md-8 col-lg-10">
                <div class="row align-items-center">
                    <div class="col-12 col-md-8 col-lg-8">
                        <h4>{{ $a->user->name }} <small  class="badge badge-purple">{{ $a->created_at->diffForHumans() }}</small></h4>
                        <p class="text-success">{{ $a->user->seeker->industry->name }}</p>
                        @if(isset($a->user->seeker->location_id))
                        <p><i class="fas fa-map-marker-alt orange"></i> {{ $a->user->seeker->location->name }},
                            {{ $a->user->seeker->location->country->name }}</p>
                        @endif
                    </div>
                    <div class="col-12 col-md-8 col-lg-8 ">
                         <?php $completed =  $a->user->seeker->calculateProfileCompletion(); ?>
                                <p>Profile; <strong>{{ $completed }}%</strong> complete</p>
                                <div class="progress" style="height: 5px">
                                    <div class="progress-bar" role="progressbar"  aria-valuemin="0" aria-valuemax="100" style="width:{{ $completed }}%">
                                    </div>
                                </div><br>
                        <h5>
                          
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row justify-content-between align-items-center">
            <div class="col-12 col-md-6 col-lg-6">
                    @if($a->status == 'selected')
                        <a href="#" class="text-success"  data-toggle="tooltip" data-placement="bottom" title="Candidate was selected"> <i class="fas fa-check"></i> <strong>SELECTED</strong></a>
                    @else

                    
                        @if($task->isShortlisted($a->user->seeker))
                            <span style="cursor: pointer">
                                <span  id="shortlist-user-{{ $a->user->id }}" title="Remove {{ $a->user->getName() }} from Shortlist"  slug="{{$task->slug}}" username="{{$a->user->username}}" user_name="{{ $a->user->getName() }}">Remove from Shortlist</span>
                            </span>

                        @else
                            <span style="cursor: pointer">
                                <span id="shortlist-user-{{ $a->user->id }}" title="Add {{ $a->user->getName() }} to shortlist " slug="{{$task->slug}}" username="{{$a->user->username}}" user_name="{{ $a->user->getName() }}">Shortlist</span>
                            </span>                            
                        @endif
                @endif
            </div>
            <div class="col-12 col-md-6 col-lg-5 text-md-right">
                <a href="/employers/browse/{{ $a->user->username }}" target="_blank" class=" btn btn-orange"  data-toggle="tooltip" data-placement="bottom" title="View Profile, CV, about and Skills">View Profile</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    <?php 
    if($a->user->seeker->canGetNotification())
        echo 'var notificationsEnabledFor'.$a->id.'=true;';
    else
        echo 'var notificationsEnabledFor'.$a->id.'=false;';

    ?>
    $().ready(function(){        
        $('#shortlist-user-{{ $a->user->id }}').click(function(){
            slug = $(this).attr('slug');
            username = $(this).attr('username');
            user_name = $(this).attr('user_name');

            $element = $(this);
            

            $.ajax({
                type: 'GET',
                url: '/admin/shortlist-toggle/'+slug+'/'+username+'?csrf-token='+$('#csrf_token').attr('content'),
                success: function(response) {

                    //$parent.children().remove();

                    if(response == 'shortlisted')
                    {
                        $element.text('Remove from Shortlist');
                        $element.attr('title','Remove '+ user_name+' shortlist');
                        notify(username + ' was shortlisted','success');
                        
                    }
                    if(response == 'remove-from-shortlist')
                    {
                        $element.text('Shortlist');
                        $element.attr('title','Add ' + user_name + ' to shortlist');
                        notify(username + ' was removed from shortlisted');
                    }
                    
                },
                error: function(e) {

                    notify('Shortlisting Error occurred', 'error');
                },
            });
            
        });

    });
</script>
                @empty
                    <div class="card mb-4">
                        <div class="card-body">
                            <p class="text-center">
                                No paas applications found
                            </p>
                        </div>
                    </div>
                @endforelse
                    
            </div>

            <div class="row">
                <div class="col">
                    {{ $pool->links() }}
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection
