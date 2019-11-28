<div class="modal fade" id="socialModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content p-3">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times" aria-hidden="true"></i>
                </button>
                <h4 class="orange">Share on Social Platforms</h4>

                <input type="text" class="form-control" name="" readonly value="A Link of Some sort">

                <div class="d-flex justify-content-around mt-3 sign-left">
                    <a href="{{ $blog->shareFacebookLink }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="{{ $blog->shareTwitterLink }}" target="_blank"><i class="fab fa-twitter"></i></a>
                    <a href="{{ $blog->shareLinkedinLink }}" target="_blank"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>