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
                    <div class="col-12 col-md-4 col-lg-4 pt-md-2 text-md-center">
                        <h5>
                            RSI 
                            <?php
                                if(!isset($last_rsi))
                                    $last_rsi = [];
                                if(!array_key_exists('seeker_'.$a->user->seeker->id, $last_rsi))
                                    $last_rsi['seeker_'.$a->user->seeker->id] = $a->user->seeker->getRsi($post);
                            ?>
                            {{ $last_rsi['seeker_'.$a->user->seeker->id] }}%
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row justify-content-between align-items-center">
            <div class="col-12 col-md-6 col-lg-6">
                @if($a->status == 'rejected')
                    <strong style="color: red"  data-toggle="tooltip" data-placement="right" title="NO ACTIONS AVAILABLE">REJECTED</strong>
                @else

                    @if($a->status == 'selected')
                        <a href="#" class="text-success"  data-toggle="tooltip" data-placement="bottom" title="Candidate was selected"> <i class="fas fa-check"></i> <strong>SELECTED</strong></a>
                    @else

                        @if($post->isShortlisted($a->user->seeker))
                            <span style="cursor: pointer">
                                <span  id="shortlist-user-{{ $a->user->id }}" title="Remove {{ $a->user->getName() }} from Shortlist"  slug="{{$post->slug}}" username="{{$a->user->username}}" user_name="{{ $a->user->getName() }}">Remove from Shortlist</span>
                            </span>

                        @else
                            <!-- <a href="/employers/shortlist-toggle/{{$post->slug}}/{{$a->user->username}}" >Shortlist</a> -->
                            <span style="cursor: pointer">
                                <span id="shortlist-user-{{ $a->user->id }}" title="Add {{ $a->user->getName() }} to shortlist " slug="{{$post->slug}}" username="{{$a->user->username}}" user_name="{{ $a->user->getName() }}">Shortlist</span>
                            </span>                            
                        @endif
                        |
                        <a href="#" id="reject-Application-{{ $a->id }}"  data-toggle="tooltip" data-placement="bottom" title="Reject Application" class="text-danger">Reject</a>
                    @endif
                @endif
            </div>
            <div class="col-12 col-md-6 col-lg-5 text-md-right">
                <a class="orange mr-2" href="/employers/applications/{{ $post->slug }}/{{ $a->id }}/rsi"  data-toggle="tooltip" data-placement="bottom" title="Additional Candidate Information">Actions</a>
                <a href="/employers/browse/{{ $a->user->username }}" target="_blank" class=" btn btn-orange"  data-toggle="tooltip" data-placement="bottom" title="View Profile, CV, about and Skills">View Profile</a>
            </div>
        </div>
    </div>
</div>
@if($a->user->seeker->canGetNotifications())
<div id="jobApplication{{ $a->id }}" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color: #500095; color: white">
                    
                    <h4 class="modal-title">
                        Give Reason for rejecting Application
                    </h4>


                    
                </div>
                 <button type="button" style="background-color: #FF5733" class="close" data-dismiss="modal" aria-label="Close" id="closeSeekerRegisterModal">
                    <i class="fas fa-times" aria-hidden="true"></i>
                  </button>
                <div class="modal-body">
                    <div>
                        <p>
                            95% of job seekers we have surveyed have stated their biggest job search frustration is lack of feedback. Please take a minute to inform {{$a->user->name}} why they didn't qualify for this position so that they can improve on the said areas.
                        </p>
                        <select class="form-control" id="rejectionSwitch{{$a->id}}">
                            <option value="Candidate doesn't meet the minimum qualifications">Candidate doesn't meet the minimum qualifications</option>
                            <option value="Candidate's profile is incomplete">Candidate's profile is incomplete</option>
                            <option value="Crucial information is missing from the candidates resume and profile">Crucial information is missing from the candidates resume and profile</option>
                            <option value="Write Reason:">Write Reason:</option>
                        </select>
                        <br>
                        <textarea class="form-control " id="rejectionMessage{{$a->id}}" rows="5" placeholder="Why is {{ $a->user->name }} not a great fit for this position?"></textarea>
                    </div>
                    <script type="text/javascript">
                        $().ready(function(){
                            var mes;
                            mes = $('select#rejectionSwitch{{$a->id}}').val();
                            $('textarea#rejectionMessage{{$a->id}}').val(mes);

                            $('#rejectionSwitch{{$a->id}}').change(function(e){
                                mes = $('select#rejectionSwitch{{$a->id}}').val();
                                if(mes != 'Write Reason:')
                                {
                                    $('textarea#rejectionMessage{{$a->id}}').val(mes);
                                }
                            });

                            $('.sendRejectionMessage{{ $a->id }}').click(function(){
                                mes = $('textarea#rejectionMessage{{$a->id}}').val();
                                if(mes.length < 1)
                                    return notify("Kindly specify why you are rejecting {{ $a->user->name }}'s application");
                                    
                                if(mes.length < 10)
                                    return notify("Rejection reason too brief","error");
                                var $scope = $('#reject-Application-{{ $a->id }}').parent();

                                $.ajax({
                                    type: 'GET',
                                    url: '/employers/reject-toggle-id/{{ $post->slug }}/{{ $a->user->id }}?csrf-token='+$('#csrf_token').attr('content')+'&message='+mes,
                                    success: function(response) {

                                        //$parent.children().remove();

                                        if(response=='rejected')
                                        {
                                            notify("{{ $a->user->name }}'s Application was Rejected");
                                            $scope.empty();
                                            $scope.append('<strong style="color: red"  data-toggle="tooltip" data-placement="right" title="NO ACTIONS AVAILABLE">REJECTED</strong>');

                                            $('#jobApplication{{ $a->id }}').modal('hide');
                                        }
                                        else
                                        {
                                            notify("An Error occurred while rejecting application. Try again later","error");
                                        }
                                        
                                    },
                                    error: function(e) {

                                        notify('Shortlisting Error occurred', 'error');
                                    },
                                });

                            });
                        });
                        
                    </script>
                    
                </div>
                <div class="modal-footer" style="text-align: center;">
                    <span class="btn btn-sm btn-orange-alt sendRejectionMessage{{ $a->id }}">Send Rejection Message</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<script type="text/javascript">
    <?php 
    if($a->user->seeker->canGetNotifications())
        echo 'var notificationsEnabledFor'.$a->id.'=true;';
    else
        echo 'var notificationsEnabledFor'.$a->id.'=false;';

    ?>
    $().ready(function(){
        $('#reject-Application-{{ $a->id }}').click(function(){
            if(confirm('Confirm application rejection'))
            {
                var continueReject = true;
                var basicSeeker = true;
                var message = null;

                if(notificationsEnabledFor{{ $a->id }})
                {
                    return $('#jobApplication{{ $a->id }}').modal();
                    // message = prompt("Why are you rejecting this application?", "Candidate doesn't meet the minimum qualifications");
                    // if(message == null || message == '')
                    // {
                    //     return notify("Kindly specify why you are rejecting {{ $a->user->name }}'s application");
                    // }
                    // basicSeeker = false;
                    //return window.location = '/employers/reject-toggle-id/{{ $post->slug }}/{{ $a->user->id }}?message='+message;
                }
                var $scope = $(this).parent();

                $.ajax({
                    type: 'GET',
                    url: '/employers/reject-toggle-id/{{ $post->slug }}/{{ $a->user->id }}?csrf-token='+$('#csrf_token').attr('content')+'&message='+message,
                    success: function(response) {

                        //$parent.children().remove();

                        if(response=='rejected')
                        {
                            notify("Application was Rejected");
                            $scope.empty();
                            $scope.append('<strong style="color: red"  data-toggle="tooltip" data-placement="right" title="NO ACTIONS AVAILABLE">REJECTED</strong>');
                        }
                        else
                        {
                            notify("An Error occurred while rejecting application. Try again later","error");
                        }
                        
                    },
                    error: function(e) {

                        notify('Shortlisting Error occurred', 'error');
                    },
                });
            }
        });
        $('#shortlist-user-{{ $a->user->id }}').click(function(){
            slug = $(this).attr('slug');
            username = $(this).attr('username');
            user_name = $(this).attr('user_name');

            $element = $(this);
            

            $.ajax({
                type: 'GET',
                url: '/employers/shortlist-toggle/'+slug+'/'+username+'?csrf-token='+$('#csrf_token').attr('content'),
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