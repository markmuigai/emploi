<div class="prompts" title="Invite Friends">
    <button type="button" name="button" class="invite" data-toggle="modal" data-target="#inviteFriends"><i class="fas fa-user-plus"></i></button>
</div>

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
                        , get Redeemable Credits
                    @endguest
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times" aria-hidden="true"></i>
                </button>
                <form class="form-group" method="post" action="/referrals">
                    @csrf
                    <label for="new_invitee">Enter Email address</label>
                    <div class="form-row" id="invitees">
                        <div class="col-md-6 col-12">
                            <input type="text" name="name" class="form-control my-1" id="new_invitee_name" placeholder="John Doe" required="">
                        </div>
                        <div class="col-md-6 col-12">
                            <input type="email" name="email" class="form-control my-1" id="new_invitee" placeholder="john@example.com" required="">
                        </div>
                        <!-- <input type="hidden" value="1" id="totalInvitees"> -->
                        <!-- <div class="col-3 col-md-2">
                            <button type="button" name="button" class="btn btn-purple add">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div> -->
                    </div>
                    <div class="mt-2">
                        @guest
                        @else
                        <a href="/profile/invites" class="btn btn-sm btn-success">My Invites</a>

                        @endguest
                        <a href="#" class="btn btn-primary" id="attachCSVButton">Invite CSV Contacts</a>
                        <button class="btn btn-orange" style="float: right;">Send Email Invite</button>
                    </div>
                </form>
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
    });
</script>