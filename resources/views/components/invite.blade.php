<div class="prompts">
    <button type="button" name="button" class="invite" data-toggle="modal" data-target="#inviteFriends"><i class="fas fa-user-plus"></i></button>
</div>

<!-- INVITE FRIEND MODAL -->
<div class="modal fade" id="inviteFriends" tabindex="-1" role="dialog" aria-labelledby="inviteFriendsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content px-3 pt-3">
            <div class="modal-body">
                <h5 class="modal-title" id="inviteFriendsLabel">Invite Friends to Use Emploi</h5>
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
                    <div class="text-right mt-2">
                        <button class="btn btn-orange">Invite</button>
                    </div>
                </form>
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