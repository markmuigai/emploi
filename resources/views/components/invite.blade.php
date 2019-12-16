<div class="prompts">
    <button type="button" name="button" class="invite" data-toggle="modal" data-target="#inviteFriends"><i class="fas fa-user-plus"></i></button>
</div>

<!-- INVITE FRIEND MODAL -->
<div class="modal fade" id="inviteFriends" tabindex="-1" role="dialog" aria-labelledby="inviteFriendsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content p-3">
            <div class="modal-body">
                <h5 class="modal-title" id="inviteFriendsLabel">Invite Friends to Use Emploi</h5>
                <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times" aria-hidden="true"></i>
                </button>
                <div action="">
                    <form class="form-group" method="post" action="/referrals">
                        @csrf
                        <label for="new_invitee">Enter Email address</label>
                        <div class="row">
                            <div class="col-9 col-md-10" id="invitees">
                                <input type="text" name="name" class="form-control my-1" id="new_invitee" placeholder="John Doe" required="">
                                <input type="email" name="email" class="form-control my-1" id="new_invitee" placeholder="john@example.com" required="">
                                <input type="hidden" value="1" id="totalInvitees">
                            </div>
                            <div class="col-3 col-md-2" style="display: none">
                                <button type="button" name="button" class="btn btn-purple add">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <button class="btn btn-orange pull-right">Invite</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END OF INVITE FRIEND MODAL -->

<script type="text/javascript">
    // Add New Email
    $('.add').on('click', add);

    function add() {
        var newInvitee = parseInt($('#totalInvitees').val()) + 1;
        var new_input = '<input type="email" id="new_invitee' + newInvitee + '" class="form-control my-1 invitee-by-email" placeholder="name@example.com">';

        $('#invitees').append(new_input);

        $('#totalInvitees').val(newInvitee);
    }
</script>
