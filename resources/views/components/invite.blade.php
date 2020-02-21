<div id="importCSVModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background-color: #500095; color: white">
                
                <h4 class="modal-title">
                    Structure CSV for Import

                </h4>
                <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">x</button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('images/csv-instructions.png') }}" style="width: 100%">
                <p>
                    <b>email </b> should be on the first column <br>
                    <b>names </b> can only be on the second column -OPTIONAL-<br>
                    <b>role </b> can only be on the third column ( 'job seeker' or 'employer')  -OPTIONAL-<br>
                    <b>message </b> custom message -OPTIONAL-<br>
                </p>
                <p style="text-align: center;">
                    <br>
                    <a type="submit" class="btn btn-sm btn-orange" id="attachCSVButton" style="color: white">Attach CSV File</a>
                    
                </p>
            </div>
        </div>
    </div>
</div>

<div class="prompts" data-toggle="tooltip" data-placement="top" title="Invite your friends, Let's reward you">
    <button type="button" name="button" class="invite" data-toggle="modal" data-target="#inviteFriends"><i class="fas fa-user-plus"></i></button>
</div>

<script type="text/javascript">
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
</script>


<!-- INVITE FRIEND MODAL -->
<div class="modal fade" id="inviteFriends" tabindex="-1" role="dialog" aria-labelledby="inviteFriendsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content px-3 pt-3">
            <div class="modal-body">
                <h5 class="modal-title" id="inviteFriendsLabel">
                    Invite Friends
                    @guest
                        to use Emploi
                    @else
                        for checkout discounts
                    @endguest
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeInviteFriendsModal">
                    <i class="fas fa-times" aria-hidden="true"></i>
                </button>
                <form class="form-group" method="post" action="/referrals">
                    @csrf
                    <label for="new_invitee">Enter Email address</label>
                    <div class="form-row" id="invitees">
                        <div class="col-md-6 col-12">
                            <input type="text" name="name" class="form-control my-1" id="new_invitee_name" placeholder="John Doe" required=""><br>
                        </div>
                        <div class="col-md-6 col-12">
                            <input type="email" name="email" class="form-control my-1" id="new_invitee" placeholder="john@example.com" required="">
                        </div>
                    </div>
                    
                    <button class="btn btn-sm btn-orange" style="float: left;">Send Invite</button>
                   
                </form>
            </div>
            <div class="modal-footer" style="text-align: center;">
                <div class="mt-2">
                    @guest
                    @else
                    
                    <a href="/profile/invites" class="btn btn-sm btn-success">My Invites</a>

                    @endguest
                    <a href="#" class="btn btn-primary" style="float: left;" id="showCsvModal" data-toggle="modal" data-target="#inviteFriends">Invite CSV Contacts</a>
                      

                </div>
            </div>
        </div>
    </div>
</div>
<!-- END OF INVITE FRIEND MODAL -->
<form action="{{ route('processCSV') }}" method="POST" enctype="multipart/form-data" style="display: none;" id="attachedCSVForm">
    @csrf
    <input type="file" name="csv" id="attachedCSV" accept=".csv" required=""  onchange="">

    
</form>

<script type="text/javascript">

    // Add New Email
    $('.add').on('click', add);

    function add() {
        var newInvitee = parseInt($('#totalInvitees').val()) + 1;
        var new_input = '<input type="email" id="new_invitee' + newInvitee + '" class="form-control my-1 invitee-by-email" placeholder="name@example.com">';

        $('#invitees').append(new_input);

        $('#totalInvitees').val(newInvitee);
    }

    $().ready(function(){
        $('#attachCSVButton').click(function(){
            $('#attachedCSV').click();
        });
        $('#attachedCSV').change(function(){
            $('#attachedCSVForm').submit();
        });
        $('#showCsvModal').click(function(){
            $('#importCSVModal').modal();
            $('#inviteFriends').modal();
        });
        //$('#importCSVModal').modal();

    });
</script>