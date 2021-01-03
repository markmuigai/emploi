<div class="modal fade" id="shareEvent{{ $meetup->id }}" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content p-3">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times" aria-hidden="true"></i>
                </button>
                <h4 class="orange">Share on Social Platforms</h4>

                <input type="text" class="form-control" name="" readonly value="{{ url('events/'.$meetup->slug) }}">

                <div class="d-flex justify-content-around mt-3 sign-left">
                    <a href="{{ $meetup->shareFacebookLink }}" target="_blank" rel="noreferrer" style="margin-right: 1em"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{ $meetup->shareTwitterLink }}" target="_blank" rel="noreferrer" style="margin-right: 1em"><i class="fab fa-twitter"></i></a>
                    <a href="{{ $meetup->shareLinkedinLink }}" target="_blank" rel="noreferrer" style="margin-right: 1em"><i class="fab fa-linkedin"></i></a>
                    <a href="{{ $meetup->shareWhatsappLink }}" data-action="share/whatsapp/share" target="_blank" rel="noreferrer" style="margin-right: 1em">
                        <img src="/images/bg1.jpeg" alt="social share" style="width: 3em">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
