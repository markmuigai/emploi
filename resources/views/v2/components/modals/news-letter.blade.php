@guest
<section>
  <div class="modal fade pt-4" id="myModal">
    <div class="modal-dialog modal-dialog-centered pt-4">
      <div class="modal-content">
          <div class="modal-text">
            <button type="button" class="close d-flex pr-3 pt-2" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-header h4">Subscribe to our Newsletter</div>
          <div class="modal-body">
            <form method="POST"  enctype="multipart/form-data" action="/v2/news-letter">
              @csrf
              <div class="form-group">
                <label for="">Name <b style="color: red">*</b></label>
                  <input type="text" class="form-control" name="name" placeholder="Enter your name" required="">

                <label for="">Email <b style="color: red">*</b></label>
                  <input type="email" class="form-control" name="email" placeholder="Enter your email" required="">
              </div>
              <div class="modal-footer">
                <input type="submit" class="btn btn-orange" style="background-color: #E15419; color: white;" name="button" value="Subscribe">
              </div>
            </form>
      </div>
    </div>
  </div>
</section>
@endguest